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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::view('/', 'welcome', ['name' => 'Putower']);

Route::get('/hola', function (){
	return ('Hola');
})->name('saludo');

Route::get('suma', function (){
	$a = 7;

	$b = 3;

	return $a + $b;
})->name('plus');

Route::get('/nombre/{name}/apellido/{lasnam?}', function ($name, $lasnam){

	return 'El nombre es ' .$name .$lasnam;
})->name('tu.nombre');

Route::get('operacion/{a?}', function($a = 4){

	$b = 3;

	return $a + $b;
});


/*Route::get('user/{name}', function($name){

	return $name;

})->where('name', '[A-Za-z]+');*/

Route::get('user/{id}', function($id){

	return $id;

})->where('id', '[0-9]+');

Route::get('user/{id}/{name}', function($id, $name){

	return 'ID: '.$id.' Name: '.$name;
})->where(['id' => '[0-9]+', 'name'=> '[a-z]+']);

Route::redirect('/publicaciones', '/articulos', 301);


Route::get('redireccion', function(){
	return redirect()->route('saludo');

});


Route::get('articulos', function(){

	return 'estoy en articulos alv';

});

Route::get('verificar', function(){
	if (Request::route()->named('verify')){
		return "OK";
	}else{
		return 'no es la rruta';
	}
})->name('verify');

Route::get('micontroller', 'Admin\AdminController@index');

Route::group(function(){
	
	Route::get('micontroller', 'AdminController@index');

	Route::get('primera', function(){

	});
	Route::get('segunda', function(){

	});
	Route::get('tercera', function(){

	});


});