<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Customer;

class ColeccionController extends Controller
{
    public function index(){
    	$data = [
			[
				'name' => 'Jose Manuel',
				'age' => '25'
			],
			[
				'name' => 'Mariana Isa',
				'age' => '29'
			],
			[
				'name' => 'Flor Felipe',
				'age' => '35'
			]
    	];

    	$workers = new Collection($data);
    	/*convertimos un array simple en una colleccion a la cual se le
    	pueden aplicar metodos para su consulta y manipulacion */
    	$worker_first = $workers->first();
    	$worker_last = $workers->last();
    	//return $workers->first();

    	//Eager Load - una sola consulta nos trae un objeto con la informacion y la relacion que enunciemos
    	$customers = Customer::with('users')->get();

    	return view('coleccion.index', compact('worker_first', 'worker_last', 'customers'));
    }
}
