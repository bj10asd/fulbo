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

Route::get('events', 'EventController@index');
Route::get('tasks/{id}','TasksController@index')->name('tasks.index');
Route::resource('tasks', 'TasksController');
Route::get('reporte-pdf','reporteController@crearpdf')->name('crearreporte.pdf');
Route::get('descargar-pdf','TasksController@pdf')->name('productos.pdf');

//Route::get('fullcalendar','FullCalendarController@index');
//Route::post('fullcalendar/create','FullCalendarController@create');
//Route::post('fullcalendar/update','FullCalendarController@update');
//Route::post('fullcalendar/delete','FullCalendarController@destroy');

Route::get('crearreporte','reporteController@index')->name('crearreporte.index');
Route::resource('crearreporte','reporteController');
Route::resource('canchas','UserController');
//Route::get('administrarroles/{id}','AdminRolesController@index')->name('administrarroles.index');

Route::resource('administrarroles','AdminRolesController');
Route::post('administrarmicancha/','AdminCanchaController@update')->name('administrarmicancha.update');
Route::get('administrarmicancha/{id}','AdminCanchaController@index')->name('administrarmicancha.index');
Route::get('administrarmicancha/amc/create/{id}','AdminCanchaController@create')->name('amc.create');
Route::get('administrarmicancha/amc/act/{id}','AdminCanchaController@act')->name('amc.act');
Route::delete('administrarmicancha/','AdminCanchaController@destroy')->name('admc.destroy');


Route::get('canchasporid/{id}','CanchasController@index')->name('canchasid.index');

//Route::get('amc/administrarmicancha/create','AdminCanchaController@create')->name('amc.administrarmicancha.create');

Route::resource('administrarmicancha','AdminCanchaController');

Route::get('{slug}', 'ControladorDePaginas@abrir');
Route::get('/', 'ControladorDePaginas@home');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');