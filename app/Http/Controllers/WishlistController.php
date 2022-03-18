<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request){

       
       
        $lang= $request->language;
 
        if($lang==='fr'){
            $must_be_logged= 'pour insérer dans la liste de souhaits, vous devez être connecté';
            $product_already_in_whislist= 'produit déjà dans votre liste de souhaits';
            $product_added_to_wishlist= 'produit ajouté à votre liste de souhaits';
          
        }elseif($lang==='en'){
 
               $must_be_logged = 'to insert to wishlist you must be logged';
               $product_already_in_whislist = 'product already in your wishlist';
               $product_added_to_wishlist = 'product added to your wishlist';
               
        }else{
            $must_be_logged= 'لإدراج المنتج في قائمة الرغبات يجب أن تكون مسجلا';
            $product_already_in_whislist= 'المنتج بالفعل في قائمة الرغبات الخاصة بك';
            $product_added_to_wishlist= 'أضاف المنتج لسلة المفضلة';
        }

        if($request->user_id){
            // dd($request->user_id);
            // Wishlist::join('products','products.id','=','wishlists.product_id')->select('products.product_slug')->where('user_id', 2)->get();

            $wishlist_count = Wishlist::find($request->user_id)->where('product_id', $request->product_id)->where('user_id', $request->user_id)->count();

            if($wishlist_count > 0) {

                    session()->put('wishlist_count', $wishlist_count );

                    $product_count = Wishlist::find($request->product_id)->where('product_id', $request->product_id)->where('user_id', $request->user_id)->count();
                   
                    if($product_count > 0) {

                        // $product = Wishlist::find($request->product_id)->where('product_id', $request->product_id)->first();
                        return redirect()->back()->with('success',  $product_already_in_whislist);

                    }else{
                        $new_wishlist = [

                            'product_id'=> $request->product_id,
                            'user_id'=> $request->user_id,
    
                        ];
    
                        Wishlist::create($new_wishlist);
                        $wishlist_count = Wishlist::find($request->user_id)->where('product_id', $request->product_id)->where('user_id', $request->user_id)->count();
                        session()->put('wishlist_count', $wishlist_count );
                        return redirect()->back()->with('success', $product_added_to_wishlist);
    
    
                    }
                    

               } else {

                    $new_wishlist = [

                        'product_id'=> $request->product_id,
                        'user_id'=> $request->user_id,
        
                    ];
    
                    Wishlist::create($new_wishlist);
                    
                    $wishlist_count = Wishlist::find($request->user_id)->where('user_id', $request->user_id)->count();

                    session()->put('wishlist_count', $wishlist_count );

                    return redirect()->back()->with('success', $product_added_to_wishlist);

               }

        }else{
            
            return redirect()->route('login', ['language'=> $request->language])->with('success',  $must_be_logged);

        }

    }


    // backoffice
    public function showWishlist(Request $request){
        return view('products.wishlist',['language'=>$request->language,'product'=>'product' ]);
    }


    //front ui carousel swift
    public function shareToSwipperCarousel(){
        if(Auth::check()){

            $wishlists = Wishlist::join('images','images.product_id', '=', 'wishlists.product_id')
                                        ->join('users','users.id','=','wishlists.user_id')
                                        ->select('thumb')
                                        ->where('user_id',3)
                                        ->get();
        }else{

            $wishlists=[
                'media/products/wood-bol-product-img-thumb.png',
                'media/products/wood-bol-product-img-thumb.png',
                'media/products/wood-bol-product-img-thumb.png',
                'media/products/wood-bol-product-img-thumb.png',
                'media/products/wood-bol-product-img-thumb.png',
                
            ];
        }

        return $wishlists ;
    }


}
