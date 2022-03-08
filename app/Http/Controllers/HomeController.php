<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;

class HomeController extends Controller
{
    public function home(Request $request){

        
    //   session()->forget('cart');
     // session()->forget('compta');
     //session()->forget('menu');

    //  $cart =session()->get('cart');
    //  unset($cart[2]);
    //  session()->put('cart', $cart);

       
        $categories= Category::with('subcategories')
        ->orderBy(DB::raw('RAND()'))
        ->get();

        //  //for navbar 
        //  session()->put('menu',$categories);
        //  dd(session()->get('menu'));
         

        $products = Product::with('ratingproducts', 'images')
            ->leftJoin('commentproducts','products.id','=','commentproducts.product_id')
            ->leftJoin('ratingproducts','products.id','=','ratingproducts.product_id')
           
            ->Select('products.*', DB::raw('avg(rating) as avg_rating'))
            ->addSelect(DB::raw('count( DISTINCT commentproducts.comment)  as comment_count'))
            ->groupBy('products.id')
            ->orderBy(DB::raw('RAND()'))
            ->paginate(15);

       
            
        //  dd($products );
        
        return view('home', [

            'products' => $products,
            'categories' => $categories,
           
        ]);
    }

    public function aboutUs(){
        return view('about-us');
    }

    public function contactUs(){
        return view('contact-us');
    }

    public function sellerApplication(){
        return view('users.seller.seller-application');
    }


}
