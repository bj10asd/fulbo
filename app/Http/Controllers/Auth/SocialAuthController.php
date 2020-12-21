<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Role;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    //
    // Método encargado de la redirección a Facebook
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
    // Método encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user();
        // Comprobamos si el usuario ya existe
        //ESTA ANDANDO MAL CREA MUCHOS
        if ($user = User::where('email', $social_user->email)->first()) {
            return $this->authAndRedirect($user); // Login y redirección
        }else{
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'name' => $social_user->name,
                'email' => $social_user->email,
                'avatar' => $social_user->avatar,
            ]);
            
            return $this->authAndRedirect($user); // Login y redirección
            
        }
    }
    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
        $user->roles()->attach(Role::where('name', 'cliente')->first());
        return redirect()->to('/home#');
    }
    
}
