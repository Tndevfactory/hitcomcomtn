<?php

namespace App\Http\Controllers\Api;

use App\Models\Tax;
use App\Models\User;
use App\Models\Image;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use SebastianBergmann\Environment\Console;
use App\Http\Controllers\ShippingController;
use Symfony\Component\Console\Output\ConsoleOutput;

class CartController extends Controller
{
    public function index(Request $request){
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        $locale = App::getLocale();
        $data =[
            'products' => $products ,
            'locale' => $locale
        ];
         return response()->json($data, 200);

    }
    public function addToCart(Request $request, ShippingController $shippingController){

        // cache()->forget('cart');
        // cache()->forget('compta');
        //  Cookie::queue( Cookie::forever('language', $request->language) );
        // echo Cookie::get('language');

         $user = cache('user');
        
        $currency =  cache('currency');
       
        $lang =  cache('language');
 
        if($lang==='fr'){
            // general responses
            $product_added_to_cart= 'Produit ajouté avec succès';
        
            // errors
            $product_not_found='Produit inexistant';
            $stock_threshhold='Limite de stock ';
 
        }elseif($lang==='en'){
 
            // general responses
            $product_added_to_cart= 'New Item added successfully';

            // errors
            $product_not_found='Non-existent product';
            $stock_threshhold='Stock limit ';
 
        }else{ //ar
 
            // general response
            $product_added_to_cart= 'اضافة المنتج بنجاح';
            
            // errors
            $product_not_found='منتج غير موجود';
            $stock_threshhold='حد المخزون ';
 
        }

        $product = Product::where('id', $request->productId)->first();
        if($product === null){

            $data =['responseBackend' => $product_not_found];
            return response()->json($data, 244);
        }

        if($lang==='fr'){

            $product_name = $product->fr_product_name;

         }elseif($lang==='en'){

             $product_name = $product->en_product_name;

         }else{

             $product_name = $product->ar_product_name;

        }
      
            
            $image = Image::find($product->id)->where('product_id', $product->id)->first();
           if($image === null){
            $image = 'media/products/support.png';
           }else{
                $image = $image->thumb;
           }
    
           $tax = Tax::find($product->tax_id)->where('id', $product->tax_id)->first();
           if($tax  === null){
            $tax_rate = 19;
           }else{
            $tax_rate = floatval($tax->rate);
           }
    

            $stock = Stock::find($product->stock_id)->where('id', $product->stock_id)->first();
           if($stock  === null){
            $stock_slug='no_stock_slug_found';
           }else{
            $stock_slug=$stock->stock_slug;
           }
    
           $product_count_sold = Product::where('stock_id',$product->stock_id)->where('status', 'sold')->count();
           $product_count_total = Product::where('stock_id',$product->stock_id)->count();
           $product_count_available = Product::where('stock_id',$product->stock_id)->where('status', 'available')->count();


        $cart = cache()->get('cart');

        
        if(!$cart){
            // cart doesnt exist and product doesnt exist, so dealing with array and create cart aftercreate with qty=1  wo atba3
            $cart =[ 
        
                $product->id => [
                                "id" => $product->id,
                                "product_name" => $product_name,
                                "product_stock_quantity" =>floatval($product_count_available),
                                "stock_slug" => $stock_slug,
                                "price" =>  floatval($product->price) , 
                                "qty" => 1,
                                "currency" => $currency,
                                "language" => $lang,
                                "user" => $user ? $user->id : null,
                                "discount" => floatval($product->discount),
                                "status" => $product->status,
                                "cart_date" => date('Y-m-d H:i:s'),
                                "product_img" => $image,
                                "tax" =>$tax_rate,
                                "shop_id" => 6,

                                ]
                ];

                cache()->put('cart', $cart, 3600); // une heure d'expiration cache time in secondes

                $cart=cache()->get('cart');

                 //compta

                 $compta_result=$this->compta($cart, $currency, $shippingController );

                 $qty=cache()->get('compta')['total_qty']?? 0.00;
                 $totat_price_ht=cache()->get('compta')['totat_price_ht'] ?? 0.00;

                    $data =[
                         
                        'cart' => cache()->get('cart') ?? '',
                        
                        'compta' => $compta_result['compta'] ?? '',
                        'cart_counter' =>  (float)$qty,
                        'total_cart' =>  (float)$totat_price_ht ,
                        'responseBackend' => $product_added_to_cart,
                        'response_code' => 200,
                        
                    ];
                    
                    return response()->json($data, 200);


        }else{ // cart exist product exist increment qty wo atba3

            if(isset($cart[$request->productId])){
                // product exist increment  wo atba3
              
                $cart[$request->productId]['qty']++;

                if($cart[$request->productId]['qty'] <= $cart[$request->productId]["product_stock_quantity"]){
               
                    cache()->put('cart', $cart, 3600);
                    //compta
    
                    $compta_result=$this->compta($cart, $currency, $shippingController );

                    $qty=cache()->get('compta')['total_qty']?? 0.00;
                    $totat_price_ht=cache()->get('compta')['totat_price_ht'] ?? 0.00;

                        $data =[
                        
                            'cart' => cache()->get('cart') ?? '',
                           
                            'cart_counter' => (float)$qty ?? '',
                            'total_cart' =>   (float)$totat_price_ht ,
                            'compta' => $compta_result['compta'] ?? '',
                            'responseBackend' =>  $product_added_to_cart,
                            'response_code' => 200,
                            
                    ];

                    return response()->json($data, 200);

 
                }else{


                    // $compta_result=$this->compta($cart, $currency, $shippingController );

                    $qty=cache()->get('compta')['total_qty']?? 0.00;
                    $totat_price_ht=cache()->get('compta')['totat_price_ht'] ?? 0.00;

                        $data =[
                        
                            'cart' => cache()->get('cart') ?? '',
                            'compta' => cache()->get('compta') ?? '',
                            'cart_counter' => (float)$qty ?? '',
                            'total_cart' =>   (float)$totat_price_ht ,
                            'responseBackend' => $stock_threshhold,
                            'response_code' => 403,
                            
                    ];

                    return response()->json($data, 243);
                }
                
                 //compta
 
                 
                
            }else{
             // product doesnt exist create with qty=1  but cart exist so dealing with cart directly wo atba3
             
             $cart[$product->id] = [
                "id" => $product->id,
                "product_name" => $product_name,
                "product_stock_quantity" =>floatval($product_count_available),
                "stock_slug" => $stock_slug,
                "price" =>  floatval($product->price) , 
                "qty" => 1,
                "currency" => $currency,
               "user" => $user ? $user->id : null,
                "language" => $lang,
                "discount" => floatval($product->discount),
                "status" => $product->status,
                "cart_date" => date('Y-m-d H:i:s'),
                "product_img" => $image,
                "tax" =>$tax_rate,
                "shop_id" => 6,

                 
             ];
                 cache()->put('cart', $cart, 3600);
                 
                 //compta
 
                 $compta_result=$this->compta($cart, $currency, $shippingController );
                
                 $qty=cache()->get('compta')['total_qty']?? 0.00;
                 $totat_price_ht=cache()->get('compta')['totat_price_ht'] ?? 0.00;

                    $data =[
                       
                        'cart' => cache()->get('cart') ?? '',
                      
                        'cart_counter' =>  (float)$qty,
                        'total_cart' =>   (float)$totat_price_ht,
                        'compta' => $compta_result['compta'] ?? '',
                        'responseBackend' => $product_added_to_cart,
                        'response_code' => 200,
                        
                    ];
                    
                    return response()->json($data, 200);
 
            }
            
         }

    }


    public function compta($cart, $currency  ,  $shippingController){


        // init calculation
        $totat_qty=0.00;
        $totat_qty=0.00;
        $totat_price_ht=0.00;
        $totat_discount=0.00;
        $total_taxes=0.00;
        $total_before_coupon=0.00;
        $coupon_value=0.00;
        $shipment_fee=0.00;
        $total_ttc=0.00;

        //compta
        foreach($cart as $id=>$info){

            $totat_qty += $info['qty'];
            $totat_price_ht += $info['qty'] * $info['price'];
            $totat_discount += $totat_price_ht * ($info['discount']/100);
            $total_taxes += ($totat_price_ht - $totat_discount  ) * ($info['tax']/100);

        }

        $total_before_coupon = ($totat_price_ht - $totat_discount) + $total_taxes;
        
        // test sur seuil et shipping
        $shipping = $shippingController->shippingConfig();
        
       

            $shipping_amount_value =  (float)$shipping["shipping_amount_value"];
            $shipping_seuil =  (float)$shipping["seuil"];

        if($shipping["shipping_calculation_method"] === 'shipping_amount_variable'){

            $shipping_amount_value === 0 ? 1.00 : (float)$shipping_amount_value;

            $shipping_amount_value = $totat_price_ht * ((float)$shipping_amount_value / 100);
            $shipment_fee = $totat_price_ht > $shipping_seuil ? 0.00 : (float)$shipping_amount_value ;

        }else{

            $shipment_fee = $totat_price_ht > $shipping_seuil ? 0.00 : (float)$shipping_amount_value ;

        }

        // $output = new ConsoleOutput();
        // $output->writeln('shipment_fee');
        // $output->writeln($shipment_fee);

        $total_ttc_before_coupon = $total_before_coupon + $shipment_fee  ;

        $compta=[

            'total_qty' => $totat_qty,
            'totat_price_ht' => $totat_price_ht,
            'totat_discount' => $totat_discount, 
            'total_taxes' => $total_taxes, 
            'total_before_coupon' => $total_before_coupon ,
            'shipment_fee'=>  $shipment_fee,
            'total_ttc_before_coupon' => $total_ttc_before_coupon,
            'currency' => $currency 
            
        ];


         cache()->put('compta', $compta, 3600);

         $compta_result=[ 'compta'=>  cache()->get('compta') ?? '', ];

        return $compta_result;

    }

    public function checkCartCount(){

        $cart=cache()->get('cart') ?? '';
        $compta=cache()->get('compta') ?? '';
        $qty=cache()->get('compta')['total_qty']?? 0.00;
        $totat_price_ht=cache()->get('compta')['totat_price_ht'] ?? 0.00;

        $currency = Cache::remember('euro_currencies', 3600, function () {
            return DB::table('currencies')->where('name','euro')->first();
        });
            // $currency = DB::table('currencies')->where('name','euro')->first();

            if($currency  === null){
                $euro_coefficient = 0;
               }else{
                $euro_coefficient   = (float)$currency->value_in_dollar ;
               }

        $data =[
                        
            'cart' =>  $cart,
            'compta' =>  $compta,
            'cart_counter' =>  (float)$qty,
            // 'total_cart' =>  $t ?  cache()->get('language') === 'euro' ? number_format($t,2,',',' ') : number_format($t,2,'.',',') : '',
             'total_cart' =>  (float)$totat_price_ht,
            'responseBackend' => 'cart counter and total cart before coupon',
            'language' => cache()->get('language'),
            'currency' => cache()->get('currency'),
            'euroCoefficient' =>  $euro_coefficient   ?? 0,
            
        ];

        return response()->json($data, 200);

    }


}
