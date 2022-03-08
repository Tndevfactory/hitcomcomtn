<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\MailController;




class LoginController extends Controller
{
    public function loginFormDisplay()
    {
        return view('users.login');
    }

    public function registerFormDisplay()
    {
        return view('users.register');
    }

    public function authLogin(Request $request)
    {

        $currency= $request->currency;
       
        $lang= $request->language;
 
        if($lang==='fr'){
 
              $response= 'Mauvais mot de passe ou e-mail erroné';
              
        }elseif($lang==='en'){
              
               $response= 'Wrong Email or Password';
 
        }else{
            
            $response= 'كلمة مرور أو بريد إلكتروني خاطئ';
 
        }

      //  dd($request->from_shoping_cart_url);

        $validatedData = $request->validate([
            'email' => ['required', 'max:255'],
            'password' => ['required',  'min:8', 'string'],
        ]);
 


        if (Auth::attempt($validatedData)) {

            switch (Auth::user()->role) {
                case 'admin':
                    return $request->has('from_shoping_cart_url') ? redirect()->back() : view('users.admin.roles.admin-profile', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
                  break;
                case 'manager':
                    return $request->has('from_shoping_cart_url') ? redirect()->back() : redirect()->route('manager-profile', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
                  break;
                case 'seller':
                    return $request->has('from_shoping_cart_url') ? redirect()->back() : redirect()->route('seller-profile', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
                  break;
                case 'client':
                    return $request->has('from_shoping_cart_url') ? redirect()->back() :  view('users.client.roles.profile', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
                  break;
                default:
                     $this->authLogout();
              }

        } else {
            return redirect()->back()->with('fail', $response);
        }

    }

    /**
     * handle register ops
     */

    public function authRegister(Request $request)
    {
        //dd($request->from_shoping_cart_url);

        $currency= $request->currency;
       
        $lang= $request->language;
 
        if($lang==='fr'){
 
              $response= 'Mauvais mot de passe ou e-mail erroné';
              
        }elseif($lang==='en'){
              
               $response= 'inscription avec succès';
 
        }else{
            
            $response= 'تم الاشتراك بنجاح';
 
        }

        // dd($request->all());
        $validatedData = $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'phone1' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'string'],
        ]);

        $validatedData['user_image'] = '/media/users/empty-user.jpg';
        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);
        
        if (!is_null($user)) {
            
            Auth::login($user);

            $data_mail_welcome=[
                'first_name' => Auth::user()->first_name,
                'recipient' => Auth::user()->email,
                'subject' => 'Welcome to hitcom',
                'content' => 'welcome mail after registration',
                'url' => config('app.url').$request->language ,
                'language' => $request->language,
            ];

            MailController::sendWelcomeMail($data_mail_welcome);

            $token=Str::random(30);  
            $expiresAt=\Illuminate\Support\Carbon::now()->addMinutes(5);
            Cache::put('verif_link_token', $token, $expiresAt);

            $data_mail_verify=[
                'first_name' => Auth::user()->first_name,
                'recipient' => Auth::user()->email,
                'subject' => 'Activation account link',
                'content' => 'please click link below to activate your account',
                'token' => $token,
                'url' => config('app.url').$request->language.'/verification-callback?token='.$token,
                'language' => $request->language,
            ];
           
    
            MailController::verifyAccount($data_mail_verify);
        }
        return redirect()->route('home', ['language' => $request->language])->with('success', $response);
    

    }

   

    public function authLogout(Request $request)
    {
        // Cache::forget('user-online'.Auth::user()->id);
        // Cache::forget('last-seen'.Auth::user()->id);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profiler($role)
    {
        // dd(Auth()->user()->id);
        switch ($role) {
            case 'admin':
                return redirect()->route('admin-dashboard', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
              break;
            case 'manager':
                return redirect()->route('manager-dashboard', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
              break;
            case 'seller':
                return redirect()->route('seller-dashboard', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
              break;
            case 'client':
                return redirect()->route('client-dashboard', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]);
              break;
            default:
                 $this->authLogout();
          }
    }


}
