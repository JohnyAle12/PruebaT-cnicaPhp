<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Para crear un chache de rutas usamos php artisan route:cache o php artisan optimize, en la rutas no se pueden usar closure ya que estas funciones no se pueden guardar en cache */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::resource('customer', 'CustomerController')->names('cliente')->middleware('auth');
	Route::resource('user', 'UserController')->names('usuario');
	Route::get('/api/users', 'UserController@getInfoDataTable');
	Route::get('coleccion', 'ColeccionController@index')->name('colecciones');
	Route::get('profile', 'UserController@profile')->name('perfil');
	Route::post('saveUserFromVue', 'UserController@saveUserFromVue')->name('guarda-usuario');
	Route::get('sendMail', 'UserController@seeMail')->name('enviar-correo');
	Route::post('sendMail', 'UserController@sendMail')->name('enviar-correo.store');
	Route::get('usingCookie', 'UserController@usingCookie')->name('galleta');
    Route::resource('provider', 'ProviderController')->names('provider');
    Route::get('provider-flush', 'ProviderController@flush')->name('provider.flush');
    Route::apiResource('articulos', 'ArticleController')->names('article');
});

Route::prefix('admin')->group(function () {
	Route::get('examplePrefix', function () {
        // Matches The "/admin/examplePrefix" URL
        return 'Vista de ejemplo ruta con prefijo';
    })->name('example.prefix');

    Route::middleware(['checkrole:Administrator|Clerk'])->group(function () {
        Route::get('session-data', 'UserController@sessionData')->name('sessiondata');
    });

    Route::get('delete-session-data', 'UserController@deleteSessionData')->name('deletesessiondata')->middleware('checkrole:Administrator|Clerk');
});

Route::name('admin.')->middleware(['auth'])->group(function () {
    Route::get('exampleRoute', function () {
        // Route assigned name "admin.example"...
        return 'Vista de ejemplo ruta name';
    })->name('example');

    Route::get('queue', 'UserController@queuExample')->name('queues');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home1', 'HomeController@ejercicio');

Route::get('vista-ejemplo', 'HomeController@vistaEjemplo');
Route::post('solucion', 'HomeController@solucionEjemplo')->name('solucion.ejemplo');

Route::pattern('id', '[0-9]{4}');
Route::get('examplePattern/{id}', function ($id) {
    return $id;
});

Route::get('consumo-api', 'HomeController@consumoApi')->name('consumo.api');





