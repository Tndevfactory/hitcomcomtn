<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\WelcomeUserMail;
use App\Mail\ResetPasswordMail;
use App\Mail\VerifyAccountMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendWelcomeMail($data_mail){

        Mail::to($data_mail['recipient'])->send(new WelcomeUserMail($data_mail));
       
        // 'recipient' => $user->email ,,
    }

    public static function resetPassword($data_mail){

        Mail::to($data_mail['recipient'])->send(new ResetPasswordMail($data_mail));
       
        // 'recipient' => $user->email ,,
    }
    public static function verifyAccount($data_mail){
        //dd($data_mail);
        Mail::to($data_mail['recipient'])->send(new VerifyAccountMail($data_mail));
       
        // 'recipient' => $user->email ,,
    }

}
