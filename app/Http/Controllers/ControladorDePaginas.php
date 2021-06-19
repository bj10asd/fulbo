<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorDePaginas extends Controller
{
    
    public function home(){
        return view('home');
        //return view('/home','HomeController@index')->name('home');
        //Route::get('/home', 'HomeController@index')->name('home');
    }
    
    
    public function abrir($slug){
        return view($slug);
    }

    public function canchas(){
        return view('/canchas','UserController@index')->name('canchas.index');
    }
}
