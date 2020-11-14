<?php

namespace App\Http\Controllers;

use App\Events\UserUpdated;
use App\Jobs\ProcessExample;
use App\Mail\RandomMessage;
use App\Models\Role;
use App\Models\Role_user;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cookie;

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

    public function saveUserFromVue(Request $request){
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return response()->json([
            'usuario' => $user
        ]);
    }

    public function seeMail(){
        return view('users.send-mail');
    }

    public function sendMail(){

        $data=[
            'user' => Auth::user()->name,
            'name' => 'Juan Manuel Lopez',
            'description' => 'I`m an engineer and work about eight hours diary'
        ];

        // es buena practica user queue en vez de send con el fin de que el usuario no tenga que esperar todo el proceso de envio y este quede en cola y se ejecute en segundo plano

        Mail::to('johnyprieto001@gmail.com')->queue(new RandomMessage($data));
        //Mail::to('johnyprieto001@gmail.com')->send(new RandomMessage);

        return 'Mensaje enviado';
    }

    public function queuExample(){

        // En el archivo env por defecto se utiliza rl driver sync, lo pasaremos a redis

        logger('Tarea 1');
        logger('Tarea 2');

        ProcessExample::dispatch('Titulo de prueba')->delay(now()->addMinutes(1));;

        return redirect()->route('home');
    }

    public function sessionData(){
        //variable de sesion estatica, no se elimina
        session(['status' => 'Task was successful!']);

        //De esta manera creamos una session data tipo flash
        //session()->flash('status', 'Task was successful!');

        // puede pasarse variables flash al momento de redireccionar a la ruta
        //return redirect()->route('home')->with('status', 'Task was successful!');

        return redirect()->route('home');
    }

    public function deleteSessionData(){
        session()->forget('status');
        return redirect()->route('home');
    }

    public function usingCookie(){

        //definimos una variable de cookie que dura un minuto

        //Forma de setear cookie php puro setcookie('prueba', '1234', time()+60); este metodo no encripta la informacion
        Cookie::queue('prueba', '5678', 1);
        $value = Cookie::get('prueba');

        // al colocar cookie la informacion se encripta en el navegador
        return redirect()
            ->route('home')
            ->cookie('prueba2', '1234', 1) // 1 minuto
            ->with('status', 'El valor de la cookie es '.$value);
    }
}
