<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request){



        if($request->user_id){
            // dd($request->user_id);
            // Wishlist::join('products','products.id','=','wishlists.product_id')->select('products.product_slug')->where('user_id', 2)->get();

            $wishlist_count = Wishlist::find($request->user_id)->where('product_id', $request->product_id)->where('user_id', $request->user_id)->count();

            if($wishlist_count > 0) {

                    session()->put('wishlist_count', $wishlist_count );

                    $product_count = Wishlist::find($request->product_id)->where('product_id', $request->product_id)->where('user_id', $request->user_id)->count();
                   
                    if($product_count > 0) {

                        // $product = Wishlist::find($request->product_id)->where('product_id', $request->product_id)->first();
                        return redirect()->back()->with('success', ' product already in your wishlist ');

                    }else{
                        $new_wishlist = [

                            'product_id'=> $request->product_id,
                            'user_id'=> $request->user_id,
    
                        ];
    
                        Wishlist::create($new_wishlist);
                        $wishlist_count = Wishlist::find($request->user_id)->where('product_id', $request->product_id)->where('user_id', $request->user_id)->count();
                        session()->put('wishlist_count', $wishlist_count );
                        return redirect()->back()->with('success', ' product added to your wishlist ');
    
    
                    }
                    

               } else {

                    $new_wishlist = [

                        'product_id'=> $request->product_id,
                        'user_id'=> $request->user_id,
        
                    ];
    
                    Wishlist::create($new_wishlist);
                    
                    $wishlist_count = Wishlist::find($request->user_id)->where('user_id', $request->user_id)->count();

                    session()->put('wishlist_count', $wishlist_count );

                    return redirect()->back()->with('success', ' product added to your wishlist ');

               }

        }else{
            
            return redirect()->route('login', ['language'=> $request->language])->with('success', 'to insert to wishlist you must be logged');

        }

    }



    public function showWishlist(Request $request){
        return view('products.wishlist',['language'=>$request->language,'product'=>'product' ]);
    }
}
