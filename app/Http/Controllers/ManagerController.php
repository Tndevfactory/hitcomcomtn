<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function managerProfile(){

        return view('users.manager.profile');
        
    }
}
