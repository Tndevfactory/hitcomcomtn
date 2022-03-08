<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Socialite;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{

   


    # redirection vers le provider

    /**
     * @param Request $request
     * @return mixed
     */
    public function redirect (Request $request) {

        $provider = $request->provider;
       
        
            
            //dd( Socialite::driver($provider));
            return Socialite::driver($provider)->redirect(); // On redirige vers le provider
        
        
        abort(404); // Si le provider n'est pas autorisé
    }


    // Callback du provider
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback (Request $request) {

        $provider = $request->provider;

       // dd( $request->language );

        if (in_array($provider, $this->providers, true)) {

            // Les informations provenant du provider
            $data = Socialite::driver($request->provider)->user();

           // dd( $data );

            # Social login - register
            $email = $data->getEmail(); // L'adresse email
            $name = $data->getName(); // le nom

            # 1. On récupère l'utilisateur à partir de l'adresse email
            $user = User::where("email", $email)->first();

            # 2. Si l'utilisateur existe
            if (isset($user)) {

                // Mise à jour des informations de l'utilisateur
                $user->name = $name;
                $user->save();

                # 3. Si l'utilisateur n'existe pas, on l'enregistre
            } else {

                // Enregistrement de l'utilisateur
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt("1234567890") // On attribue un mot de passe
                ]);
            }

            # 4. On connecte l'utilisateur
            auth()->login($user);

            # 5. On redirige l'utilisateur vers /home
            if (auth()->check()) return redirect()->route('profile-client', 
            ['id'=>$user->id, 'language'=> $request->language ]);

        }
        abort(404);
    }


}
