<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyController extends Controller
{
     public function verifyEmailView()
    {
        // we use middleware verify to track verified route in webrouter // route profile-home-client
         return view('users.verify-form');
    }


    public function verifyEmailLink(Request $request)
        {
         $user=Auth::user();

         if(!$user){
             return redirect()->back()
            ->with(['fail' => 'user not found in our records', 'language'=> $request->language]);
         }

        $token=Str::random(30);

        $expiresAt=Carbon::now()->addMinutes(5);

        $language=$request->language;

        Cache::put('verif_link_token', $token, $expiresAt );

        $data_mail=[
            'first_name' => $user->first_name,
            'recipient' => $user->email,
            'subject' => 'Activation account link',
            'content' => 'please click link below to activate your account',
            'token' => $token,
            'url' => config('app.url').$request->language.'/verification-callback?token='.$token,
            'language' => $request->language,
        ];
       

        MailController::verifyAccount($data_mail);

        return redirect()->back()
            ->with(['success' => 'verif link sent to your email box', 'language'=> $request->language]);

     }

    public function handleVerifyCallback(Request $request)
    {

       // dd($request->token);

           if(Cache::get('verif_link_token') === $request->token){

            $user=Auth::user();

            

            if($user){
                $user->update(['email_verified_at'=> Carbon::now()]);
                //dd($user );
            }else{
                return redirect()->back()
               ->with(['fail' => 'user not found , something went wrong', 'language'=> $request->language]);
            }

        }else{

            return redirect()->back()
               ->with(['fail' => 'verification expired, click reset verification link', 'language'=> $request->language]);
        }

         return redirect()
            ->route('home', ['language'=> $request->language])
            ->with(['success' => 'Account activated with success', 'language'=> $request->language]);


           
    }


}
