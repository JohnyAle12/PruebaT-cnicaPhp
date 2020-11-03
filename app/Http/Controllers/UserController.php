<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_user;
use App\Events\UserUpdated;
use Auth;

class UserController extends Controller
{

    public function index()
    {
        Auth::user()->autorizeRoles(['Administrator']);
        return view('users.index');
    }

    public function create()
    {
        Auth::user()->autorizeRoles(['Administrator']);
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Auth::user()->autorizeRoles(['Administrator']);
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ],[
            'name.required' => 'El campo nombre es requerido.',
            'email.required' => 'El campo correo electrónico es requerido.',
            'password.required' => 'El campo contraseña es requerido.',
            'password.min' => 'La contraseña debe ser mayor a 8 characteres.',
            'role.required' => 'El campo rol de usuario es requerido.'
        ]);

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        $role_user = new Role_user;
        $role_user->user_id = $user->id;
        $role_user->role_id = $request->get('role');
        $role_user->save();


        return redirect()->route('usuario.create')->with('message', 'el usuario se ha creado con éxito.');
    }

    public function getInfoDataTable(){
        Auth::user()->autorizeRoles(['Administrator']);
        return datatables()->eloquent(User::query())->toJson();
    }

    public function profile(){
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function update(Request $request, User $user){
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ],[
            'name.required' => 'El campo nombre es requerido.',
            'email.required' => 'El campo correo electrónico es requerido.'
        ]);

        User::where('id', $user->id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        event(new UserUpdated($user, $request));

        return redirect()->route('perfil')->with('message', 'información actualizada con éxito.');
    }
}
