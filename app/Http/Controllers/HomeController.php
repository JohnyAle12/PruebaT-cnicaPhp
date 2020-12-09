<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vistaEjemplo(){
        return view('vista_ejemplo');
    }

    public function solucionEjemplo(Request $request){
        $number = $request->number;
        $cadena = '';

        if($number > config('app.max_num')){
            $number = config('app.max_num');
        }

        for ($i=0; $i <= $number; $i++) {

            if(($i%3 === 0) && ($i%5 === 0)){
                $cadena .= "BeepBoop - ";
            }else if($i%3 === 0){
                $cadena .= "Beep - ";
            }else if($i%5 === 0){
                $cadena .= "Boop - ";
            }else{
                $cadena .= $i." - ";
            }
        }

        return view('vista_ejemplo', compact('cadena'));
    }

    //metodo de ejemplo
    public function ejercicio($valor = 5){

        if($valor<3){
            return $valor;
        }
        $resultado = $this->ejercicio($valor-1)*$this->ejercicio($valor-2);
        return $resultado;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $users = User::limit(5)->get();
            return response()->json($users);
        }

        return view('home');
    }

    public function consumoApi(){

        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->json();

        return view('consumo.index', compact('posts'));
    }
}
