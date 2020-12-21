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
}
