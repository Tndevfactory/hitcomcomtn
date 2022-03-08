<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function changeCurrency(Request $request){

        $request->session()->put('currency', $request->currency) ;

        return redirect()->back();

    }
}
