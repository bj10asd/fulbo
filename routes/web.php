<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::get('events', 'EventController@index');
Route::get('tasks/{id}','TasksController@index')->name('tasks.index');
Route::resource('tasks', 'TasksController');
Route::get('descargar-pdf','TasksController@pdf')->name('productos.pdf');
//Route::get('fullcalendar','FullCalendarController@index');
//Route::post('fullcalendar/create','FullCalendarController@create');
//Route::post('fullcalendar/update','FullCalendarController@update');
//Route::post('fullcalendar/delete','FullCalendarController@destroy');

Route::get('canchasporid/{id}','CanchasController@index')->name('canchasid.index');
Route::resource('canchasporid','CanchasController');

Route::get('/','UserController@index')->name('Cancha');
Route::resource('canchas','UserController');




Route::get('users', 'UserController@index');

Route::get('{slug}', 'ControladorDePaginas@abrir');

Route::get('/', 'ControladorDePaginas@home');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');



