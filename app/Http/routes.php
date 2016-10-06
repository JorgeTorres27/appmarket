<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('appmarket/public', function () {
    return view('welcome');
});



Route::group(['middleware' => ['web']], function (){

  route::get('usuario', function(){
    return 'Hola Jorge Torres';
  });



  route::get('usuario/{nombre}', function($nombre){
    return 'Hola Jorge Torres tu codigo es ' .$nombre;
  })
  ->where('nombre','[A-Za-z]+');



  route::get('escritorio',[
    'as'=> 'escritorio', 'uses'=>'DesktopController@index']);


    route::get('producto','ProductoController@index');
    
    route:: resource('marca','MarcaController');

    //------------------------------------------------------------------//

    route::get('panel', 'AdministratorController@panel');
    route::get('access', 'AdministratorController@access');
    route::get('reports', 'AdministratorController@reports');



//------------------------------------------------------------------//
    route::get('dashboard','DashboardController@index');
    //route::get('product','ProductController@index');
    route::resource('product','ProductController');
    route::get('modelweb','DashboardController@modelweb');


});
