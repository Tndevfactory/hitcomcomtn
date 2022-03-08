<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MessageNotification;

class ClientController extends Controller
{
    public function clientProfile(){

        return view('users.client.roles.profile');
        
    }

    // notifications area--------------------------------------

    public function clientManageNotifications(){

        return view('users.client.roles.notifications-list');
        
        }
    public function clientNotificationForm(){

      return view('users.client.roles.notification-form');
      
      }
    public function clientNotificationSend(Request $request){

    // put email validation
    // search user to notify $user=User::where('email', $request->email)
    
      $user=Auth::user(); 
    $data=[
      'subject'=>$request->subject,
      'message'=>$request->message,
      'language'=>$request->language,
    ];
      $inf=$user->notify(new MessageNotification($data));
      

      return redirect()->back()->with('success', 'message sent to '.$request->email);
      
      }
}
