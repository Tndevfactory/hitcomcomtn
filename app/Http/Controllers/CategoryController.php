<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showCategory(Request $request){

        

       $slug=$request->slug;
       $currency=$request->currency;

    //    dd($slug , $currency);
    
       $category = Category::where('category_slug', $slug)->first();
      
       if(!isset($category)){ abort(404);}
      

    //    dd($category ->products);

       $subcategories = $category -> subcategories;

       

       $products = $category ->products()
       ->with('ratingproducts', 'images')
       ->leftJoin('commentproducts','products.id','=','commentproducts.product_id')
       ->leftJoin('ratingproducts','products.id','=','ratingproducts.product_id')
       ->Select( DB::raw('avg(rating) as avg_rating'))
       ->addSelect(DB::raw('count( DISTINCT commentproducts.comment)  as comment_count'))
       ->groupBy('products.id')
       
       ->paginate(15);

    //    dd($products);
       
       
    //    with('commentratings', 'images')
    //         ->leftJoin('commentproducts','products.id','=','commentproducts.product_id')
    //         ->leftJoin('ratingproducts','products.id','=','ratingproducts.product_id')
           
    //         ->Select('products.*', DB::raw('avg(rating) as avg_rating'))
    //         ->addSelect(DB::raw('count( DISTINCT commentproducts.comment)  as comment_count'))
    //         ->groupBy('products.id')
    //         ->paginate(15);
     
    
        return view('products.category',[
            'language'=>$request->language,
            'currency'=>$request->currency,
            'products'=>$products ,
            'category'=>$category,
            'subcategories'=>$subcategories,

        ]);
        
    }

    public function forTestFilter(Request $request){

       
        $subcategory='1';
        $orderby_field='products.updated_at';
        $orderby_direction='ASC';
        $rating='3';
        $price=600;

       

        if($request->has('subcategoryslug')){

            //  $result=Subcategory::with('products')
            //  ->where('subcategory_slug', $request->subcategoryslug)->get();

            $result= Product::with('images')->where('subcategory_id',  $subcategory)
            ->where('en_pricr','>', $price)->join('commentproducts','commentproducts.product_id','=','products.id')
            ->havingRaw(" avg(commentproducts.rating) <= ? ", [$rating])->groupBy('commentproducts.id')
            ->orderByRaw("$orderby_field $orderby_direction ")
            ->get()->toArray();

            // $result= Product::with('images','subcategory')
            // ->where('subcategory_id',  $subcategory)
            // ->join('commentproducts','commentproducts.product_id','=','products.id')
            // ->havingRaw("round(avg(commentproducts.rating)) = ?", [$rating])
            // ->groupBy('commentproducts.id')
            // ->orderByRaw("$orderby_field $orderby_direction ")
            // ->get();

             // $report = DB::table('orders')
            // ->selectRaw('count(id) as number_of_orders, customer_id')
            // ->groupBy('customer_id')
            // ->havingBetween('number_of_orders', [5, 15])
            // ->get();


        //     Product::with('images','subcategory')
        //     ->where('subcategory_id','1')
        //     ->join('commentproducts','commentproducts.product_id','=','products.id')
        //     ->havingRaw(' avg(commentproducts.rating) = ?',[2])
        //     ->groupBy('commentproducts.id')
        //     ->orderByRaw("$f  $o ")
        //     ->get();

        //     Product::with('images','subcategory')
        //     ->where('subcategory_id','1')
        //     ->join('commentproducts','commentproducts.product_id','=','products.id')
        //     ->havingRaw(' avg(commentproducts.rating) <= ?',[2])
        //     ->groupBy('commentproducts.id')
        //     ->orderBy('updated_at')
        //     ->get();


        //     Product::with('images','subcategory')
        //     ->where('subcategory_id','1')
        //     ->join('commentproducts','commentproducts.product_id','=','products.id')
        //     ->selectRaw('avg(commentproducts.rating) as avgrating')
        //     ->havingRaw(' avgrating > 2')
        //     ->get();


        //    $avg_rating=Product::with('images','subcategory')
        //    ->where('subcategory_id','1')
        //    ->join('commentproducts','commentproducts.product_id','=','products.id')
        //    ->average('commentproducts.rating');

        //     $result=Product::with('images')
        //     ->with('subcategory')
        //     ->where('subcategory_id','1')
        //     ->join('commentproducts','commentproducts.product_id','=','products.id')
        //     ->where('commentproducts.rating', '>=', '4')
        //     ->get();
            
            // Product::join('commentproducts','commentproducts.product_id','=','products.id')
            // ->where('commentproducts.rating', '=', '4')
            // ->get(['products.fr_price','commentproducts.rating'])
            // ->toArray()
             
            //  $result=Product::with('images')
            //  ->with('subcategory')
            //  ->where('subcategory_id','1')
            //  ->when($request->rating5, function ($query, $categorie) {
            //          return $query->where('categorie', 'like', "%{$categorie}%");
            //     })
            //  ->get();

            $reqs = [
                [
                  
                    // 'request' => $request->subcategoryslug,
                    'data' => $result,
                    
                    
                ],
                
            ];
        } else {

            $result=Category::with('products')
            ->where('category_slug', $request->categoryslug)->get();

            $reqs = [
                [
                  
                    'request' => $request->categoryslug,
                    'data' => $result,
                    
                ],
                
            ];

        }
        // $inputs=$request->all();

        // $request->whenHas('subcategoryslug', function ($inputs) {
           
        //     $result=Subcategory::when($inputs->subcategoryslug, function ($query, $subcategoryslug) {
                
        //         return $query->where('subcategory_slug', 'like', "%{$subcategoryslug}%");
                
        //     })->paginate(15);

        // }, function () {

        //     $result= Category::when($inputs->categoryslug, function ($query, $categoryslug) {
               
        //         return $query->where('category_slug', 'like', "%{$categoryslug}%");

        //          })->paginate(15);

        // });

        // $annonces = Annonce::when($request->term, function ($query, $term) {
        //     return $query->where('title', 'like', "%{$term}%");
        // })->when($request->categorie, function ($query, $categorie) {
        //     return $query->where('categorie', 'like', "%{$categorie}%");
        // })->when($request->price && in_array($request->price, ['more-expensive', 'less-expensive']), function ($query) use ($request) {
        //     return $query->orderBy('price', $request->price == 'less-expensive' ? 'asc' : 'desc');
        // }, function ($query) {
        //     return $query->orderByDesc('id');
        // })->paginate(15);
       
        
        return $reqs; 
    }

    public function filterCategory(Request $request){
        
        
        //dd($request->all());


       $name_ascending = null;
       $name_descending = null;
       $price_ascending = null;
       $price_descending = null;
       $min_price = null;
       $max_price = null;
       $rating5 = null;
       $rating4 = null;
       $rating3 = null;


       $rating5=$request->rating5;
       $rating4=$request->rating4;
       $rating3=$request->rating3;

       $min_price=(int)$request->min_price;
       $max_price=(int)$request->max_price;

    //    var_dump($min_price );

       $tri=$request->tri;

       switch($tri){
           case "name_ascending": 
            $name_ascending = "name_ascending";
            break;
           case "name_descending": 
            $name_descending = "name_descending";
            break;
           case "price_ascending": 
            $price_ascending = "price_ascending";
            break;
           case "price_descending": 
            $price_descending = "price_descending";
            break;

           default:
           $name_ascending = "name_ascending";
       }


       $slug=$request->category_slug;
       $currency=$request->currency;


if(isset($request->subcategory_slug)){

        // subcategories zone;-------------------------
    
     $subcategory = Subcategory::where('subcategory_slug', $request->subcategory_slug)->first();
     if(!isset($subcategory)){ abort(404);}
     
     $category = Category::where('id', $subcategory->category_id)->first();
 //   dd($category->category_slug);



 $products_brut = Product::with('ratingproducts', 'images')
    ->leftJoin('commentproducts','products.id','=','commentproducts.product_id')
    ->leftJoin('ratingproducts','products.id','=','ratingproducts.product_id')
    ->Select( 'products.*', DB::raw('avg(rating) as avg_rating'))
    ->addSelect(DB::raw('count( DISTINCT commentproducts.comment)  as comment_count'))
    ->where('subcategory_id', $subcategory->id )
    ->groupBy('products.id')
    ->when($request->rating5 , function ($query, $rating5) {
          
        return $query->havingRaw('avg_rating > ?', [4]);

    })
  ->when($request->rating4 , function ($query, $rating4) {
     
        return $query->havingRaw('avg_rating = ?', [4]);

    })
  ->when($request->rating3 , function ($query, $rating3) {
     
        return $query->havingRaw('avg_rating < ?', [4]);

    })
   ->havingBetween('products.price', [ $min_price , $max_price])
  ->when($price_ascending , function ($query, $price_ascending) {
     
        return $query->orderBy('products.price','ASC');

    })
  ->when($price_descending, function ($query, $price_descending) {
     
        return $query->orderBy('products.price','DESC');

    })
  ->when($name_ascending && $request->language == 'fr', function ($query, $name_ascending) {
     
        return $query->orderBy('products.fr_product_name','ASC');

    })
  ->when($name_descending  && $request->language == 'fr' , function ($query, $name_descending) {
     
        return $query->orderBy('products.fr_product_name','DESC');

    })
  ->when($name_ascending && $request->language == 'en', function ($query, $name_ascending) {
     
        return $query->orderBy('products.en_product_name','ASC');

    })
  ->when($name_descending  && $request->language == 'en' , function ($query, $name_descending) {
     
        return $query->orderBy('products.en_product_name','DESC');

    })
  ->when($name_ascending && $request->language == 'ar', function ($query, $name_ascending) {
     
        return $query->orderBy('products.ar_product_name','ASC');

    })
  ->when($name_descending  && $request->language == 'ar' , function ($query, $name_descending) {
     
        return $query->orderBy('products.ar_product_name','DESC');

    });
    
    $products = $products_brut->paginate(12)->withQueryString();
    
 //    dd($products);
         return view('products.category',[
             'language'=>$request->language,
             'currency'=>$request->currency,
             'products'=>$products ,
             'subcategory'=>$subcategory,
             'category'=>$category ,
             'subcategories'=>[],

         ]);

   } // end subcategory filter



     //   categories zone;-------------------------------------

    
       $category = Category::where('category_slug', $request->category_slug)->first();
      
       if(!isset($category)){ abort(404);}
      

    //    dd($category ->products);


       $subcategories = $category -> subcategories;

       
       

       $products_brut = $category ->products()
       ->with('ratingproducts', 'images')
       ->leftJoin('commentproducts','products.id','=','commentproducts.product_id')
       ->leftJoin('ratingproducts','products.id','=','ratingproducts.product_id')
       ->Select( DB::raw('avg(rating) as avg_rating'))
       ->addSelect(DB::raw('count( DISTINCT commentproducts.comment)  as comment_count'))
       ->groupBy('products.id')
       ->when($request->rating5 , function ($query, $rating5) {
          
             return $query->havingRaw('avg_rating > ?', [4]);

         })
       ->when($request->rating4 , function ($query, $rating4) {
          
             return $query->havingRaw('avg_rating = ?', [4]);

         })
       ->when($request->rating3 , function ($query, $rating3) {
          
             return $query->havingRaw('avg_rating < ?', [4]);

         })
        ->havingBetween('products.price', [ $min_price , $max_price])
       ->when($price_ascending , function ($query, $price_ascending) {
          
             return $query->orderBy('products.price','ASC');

         })
       ->when($price_descending, function ($query, $price_descending) {
          
             return $query->orderBy('products.price','DESC');

         })
       ->when($name_ascending && $request->language == 'fr', function ($query, $name_ascending) {
          
             return $query->orderBy('products.fr_product_name','ASC');

         })
       ->when($name_descending  && $request->language == 'fr' , function ($query, $name_descending) {
          
             return $query->orderBy('products.fr_product_name','DESC');

         })
       ->when($name_ascending && $request->language == 'en', function ($query, $name_ascending) {
          
             return $query->orderBy('products.en_product_name','ASC');

         })
       ->when($name_descending  && $request->language == 'en' , function ($query, $name_descending) {
          
             return $query->orderBy('products.en_product_name','DESC');

         })
       ->when($name_ascending && $request->language == 'ar', function ($query, $name_ascending) {
          
             return $query->orderBy('products.ar_product_name','ASC');

         })
       ->when($name_descending  && $request->language == 'ar' , function ($query, $name_descending) {
          
             return $query->orderBy('products.ar_product_name','DESC');

         });
        //  ->inRandomOrder();
    //    ->havingRaw('avg_rating > ?', [4])
    //    ->havingBetween('products.price', [0, 100])
    //    ->havingBetween('products.euro_price', [0, 100])
    //    ->havingBetween('avg_rating', [1, 3])
    //    ->orderBy('products.price','DESC')
       
       
       
       $products = $products_brut->paginate(12)->withQueryString();

       return view('products.category',[
        'language'=>$request->language,
        'currency'=>$request->currency,
        'products'=>$products ,
        'category'=>$category,
        'subcategories'=>$subcategories,

    ]);

        // "currency" => "euro"
                // "category_slug" => "table-arts"
                // "subcategory_slug" => "Bowls-and-salad-bowls-1"
                // "rating5" => "5"
                // "min_price" => "0"
                // "max_price" => "5001"

                // "currency" => "euro"
                // "category_slug" => "table-arts"
                // "rating5" => "5"
                // "min_price" => "0"
                // "max_price" => "5001
     

        // $annonces = Annonce::when($request->term, function ($query, $term) {
          
        //     return $query->where('title', 'like', "%{$term}%");

        // })->when($request->categorie, function ($query, $categorie) {
           
        //     return $query->where('categorie', 'like', "%{$categorie}%");

        // })->when($request->price && in_array($request->price, ['more-expensive', 'less-expensive']), function ($query) use ($request) {
           
        //     return $query->orderBy('price', $request->price == 'less-expensive' ? 'asc' : 'desc');
        
        // }, function ($query) {
          
        //     return $query->orderByDesc('id');
       
        // })->paginate(15);


    }
    
}
