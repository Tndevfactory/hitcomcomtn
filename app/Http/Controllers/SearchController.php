<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchQuery(Request $request){

        $validated = $request->validate([
            'item' => 'required|max:255',
        ]);

       $lang = $request->language;
       $searchTerm = $request->item;


            $products = Product::with('images', 'subcategory')  

              ->when($request->item  , function($query, $searchTerm){
                     
                return $query-> 
                     where('en_product_name' , 'LIKE' , '%'.$searchTerm.'%')
                     ->orWhere('fr_product_name' , 'LIKE' , '%'.$searchTerm.'%')
                     ->orWhere('ar_product_name' , 'LIKE' , '%'.$searchTerm.'%');
               
                 })->paginate(12)->withQueryString();

       
       

        return view('products.search', ['language'=>$request->language, 'products'=> $products, 'item'=> $request->item  ]);
    }
}
