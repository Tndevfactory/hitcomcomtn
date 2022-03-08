<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Ratingproduct;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProduct(Request $request){
      
        $slug=$request->slug;

            // product part
    
            $product = Product::where('product_slug', $slug)->with('images')->first();
           if(!isset($product)){  abort(404); }
             
             $product_rating =Product::where('product_slug', $slug)
             ->join('ratingproducts', 'ratingproducts.product_id', '=', 'products.id')
             ->select(DB::raw('AVG(ratingproducts.rating) as avg_rating_product'))->first();

             $product_comment_count =Product::where('product_slug', $slug)
             ->join('commentproducts', 'commentproducts.product_id', '=', 'products.id')
             ->select(DB::raw('COUNT(commentproducts.comment) as comment_count'))
             ->first();


             // seller /shop part

             $shop = Shop::where('shops.id',  $product->seller_id)->firstOrFail();

            // dd($seller);

             $seller_rating =Shop::where('shops.id',  $product->seller_id)
             ->join('ratingsellers', 'ratingsellers.shop_id', '=', 'shops.id')
             ->select(DB::raw('AVG(ratingsellers.rating) as avg_rating_seller'))->first();

             $seller_comment_count =Shop::where('shops.id',  $product->seller_id)
             ->join('commentsellers', 'commentsellers.seller_id', '=', 'shops.id')
             ->select(DB::raw('COUNT(commentsellers.comment) as comment_count_seller'))->first();


           

            // big loop comment
            $reviews =  Ratingproduct::where('product_id', $product->id)->with('user','commentproduct')->paginate(10);

                
            // $reviews =  User::with([
                            
            //                 'ratingproducts' => function($query){ return $query->where('product_id', 2); } ,
            //                 'commentproducts'=> function($query){ return $query->where('product_id', 2); }
                            
            //                 ])->paginate(15);
                
       //dd($reviews);
        
         return view('products.product',[
           
             'language'=>$request->language,
             'product'=>$product,
             'product_rating'=>$product_rating,
             'product_comment_count'=>$product_comment_count,
             'seller_rating'=>$seller_rating ,
             'seller_comment_count'=>$seller_comment_count,
             'reviews'=>$reviews,
             'shop'=>$shop
            
            ]);
    }
}
