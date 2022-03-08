<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;



class ResetPasswordController extends Controller
{
    public function passwordEmailForm()
    {
       
        return view('users.password-ask-form');
    }


    public function passwordResetLink(Request $request)
    {

       $email= $request->validate(['email' => 'required|email']);

       $user=User::where('email', $email)->first();
       
        if(!$user){
             return redirect()->back()->with(['fail' => 'email not found in our records', 'language'=> $request->language]);
         }

        $token=Str::random(30);

        $expiresAt=Carbon::now()->addMinutes(5);

        $data_mail=[
            'first_name' => 'User',
            'recipient' => $request->email,
            'subject' => 'Reset password Hitcom',
            'content' => 'please click link below to reset your email',
            'token' => $token,
            'url' => config('app.url').$request->language.'/reset-password?token='.$token.'&email='.$request->email,
            'language' => $request->language,
        ];

        MailController::resetPassword($data_mail);


        Cache::put('reset_link_token', $token, $expiresAt );

        return redirect()->back()
            ->with(['success' => 'reset link sent to your email box', 'language'=> $request->language]);
    }


    public function passwordResetForm(Request $request)
    {
        return view('users.password-update-form', ['token' => $request->token, 'email' => $request->email ]);
    }


    public function passwordUpdate(Request $request)
    {
        $validated_data=$request->validate([
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $validated_data['password']=Hash::make($request->password);

        if(Cache::get('reset_link_token') === $validated_data['token']){

            $user=User::where('email', $validated_data['email'])->first();

            if($user){
                $user->update(['password'=> $validated_data['password']]);
            }else{
                return redirect()->back()
                ->with(['fail' => 'something went wrong', 'language'=> $request->language]);
            }

        }else{

            return redirect()->back()
            ->with(['fail' => 'reset time expired please retry', 'language'=> $request->language]);
        }

         return redirect()
            ->route('login', App::getLocale())
            ->with(['success' => 'password reset', 'language'=> $request->language]);

    }

}
