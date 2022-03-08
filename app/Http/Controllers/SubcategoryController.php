<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function showSubcategory(Request $request){
       
        // dd($request->slug);

        $slug=$request->slug;
        $currency=$request->currency;

        $subcategory = Subcategory::where('subcategory_slug', $slug)->first();
        $category = Category::where('id', $subcategory->category_id)->first();
    //   dd($category->category_slug);



       $products = Product::with('ratingproducts', 'images')
       ->leftJoin('commentproducts','products.id','=','commentproducts.product_id')
       ->leftJoin('ratingproducts','products.id','=','ratingproducts.product_id')
       ->Select( 'products.*', DB::raw('avg(rating) as avg_rating'))
       ->addSelect(DB::raw('count( DISTINCT commentproducts.comment)  as comment_count'))
       ->where('subcategory_id', $subcategory->id )
       ->groupBy('products.id')
       
       ->paginate(15);
    //    dd($products);
            return view('products.category',[
                'language'=>$request->language,
                'currency'=>$request->currency,
                'products'=>$products ,
                'subcategory'=>$subcategory,
                'category'=>$category ,
                'subcategories'=>[],

            ]);

    }
}
