<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
    $login_data = $request->validate([
        "email" => "email|required",
        "password" => "required",
      ]);
  
      
      if (!Auth()->attempt($login_data)) {
        return response(["message" => "erreur authentification"]);
      }
  
      $accessToken = auth()
        ->user()
        ->createToken("authToken")->accessToken;
  
    $data=[
        "user" => auth()->user(),
        "access_token" => $accessToken,
    ];
      return response()->json($data,200);
    }

    public function testToken(Request $request)
    {
        
        $token = $request->bearerToken();
  
    $data=[
        "info" => 'access protected area',
         "bearer_token" => $token
    ];
      return response()->json($data,200);
    }
}
