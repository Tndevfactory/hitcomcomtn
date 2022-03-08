<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   // front office - zone ----
    public function showSeller(Request $request){

        // dd($request->all());
         // seller /shop part

         $shop = Shop::where('shop_slug',  $request->shop_slug)->firstOrFail();

        return view('products.seller', [
            'shop'=>$shop
        ]);
        
    }


    // back office- zone-----

    public function sellerProfile(){

        return view('users.seller.profile');
        
    }


}
