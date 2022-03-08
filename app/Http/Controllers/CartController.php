<?php

namespace App\Http\Controllers;

use session;
use App\Models\Tax;
use App\Models\Image;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){


        $product = Product::find($request->id)->where('id', $request->id)->firstOrFail();
       

       if(!isset($product)) {
        abort(404);
       };
       
       

       $image = Image::find($product->id)->where('product_id', $product->id)->firstOrFail();
    //    dd($image);

       $tax = Tax::find($product->tax_id)->where('id', $product->tax_id)->firstOrFail();

       $stock = Stock::find($product->stock_id)->where('id', $product->stock_id)->firstOrFail();

       $product_count_sold = Product::where('stock_id',$product->stock_id)->where('status', 'sold')->count();
       $product_count_total = Product::where('stock_id',$product->stock_id)->count();
       $product_count_available = Product::where('stock_id',$product->stock_id)->where('status', 'available')->count();

       $currency= $request->currency;
       
       $lang= $request->language;

       if($lang==='fr'){

             $product_name = $product->fr_product_name;
             $response= 'Produit ajouté avec succes';
             $multiple_currency='plusieurs devises dans la même commande sont interdites';
             $stock_threshhold='Limite de stock veuillez contacter le responsable du stock HITCOM';

       }elseif($lang==='en'){

              $product_name = $product->en_product_name;
              $response= 'New Item added to basket successfully';
              $multiple_currency='multiple currency in the same order is forbidden';
              $stock_threshhold='Stock limit please contact HITCOM stock manager';

       }else{

           $product_name = $product->ar_product_name;
           $response= 'اضافة المنتج بنجاح';
           $multiple_currency='يحظر تعدد العملات في نفس الترتيب';
           $stock_threshhold='حد المخزون يرجى الاتصال بمدير هيتكوم';

       }
       
       

        $cart = session()->get('cart');

        
        if(!$cart){
            // cart doesnt exist and product doesnt exist create with qty=1  wo atba3
            $cart =[ 
        
                $request->id => [
                                "id" => $request->id,
                                "product_name" => $product_name,
                                "product_stock_quantity" =>floatval($product_count_available),
                                "stock_slug" => $stock->stock_slug,
                                "price" =>  $currency === 'euro' ? floatval($product->euro_price) : floatval($product->price) , 
                                "qty" => 1,
                                "currency" => $currency,
                                "user_id" => $request->user_id,
                                "language" => $lang,
                                "discount" => floatval($product->discount),
                                "status" => $product->status,
                                "cart_date" => date('Y-m-d H:i:s'),
                                "product_img" => $image->product_image,
                                "tax" => floatval($tax->rate),
                                "shop_id" => 6,
        
                                ]
                ];

                session()->put('cart', $cart);

                
                 //compta

                 $multiple_currencies_in_same_orders=$this->compta($cart, $currency );

                 // dd($multiple_currencies_in_same_orders);

                if(!$multiple_currencies_in_same_orders) {

                    return redirect()->back()->with('success', $response );
                }else{
                      return redirect()->back()->with('fail', $multiple_currency);
                }
        }else{


           if(isset($cart[$request->id])){
               // product exist increment  wo atba3
             
               $cart[$request->id]['qty']++;
               $cart[$request->id]['price']= $currency === 'euro' ? floatval( $product->euro_price ) : floatval(  $product->price );
              
               if($cart[$request->id]['qty'] <=$cart[$request->id]["product_stock_quantity"]){
                   
                session()->put('cart', $cart);

               }else{
                return redirect()->back()->with('fail', $stock_threshhold );
               }
               

              
                //compta

                $multiple_currencies_in_same_orders=$this->compta($cart, $currency );

                // dd($multiple_currencies_in_same_orders);

               if(!$multiple_currencies_in_same_orders) {

                   return redirect()->back()->with('success', $response );
               }else{
                     return redirect()->back()->with('fail', $multiple_currency);
               }


           }else{
            // product doesnt exist create with qty=1  wo atba3
            
            $cart[$request->id] = [
                "id" =>$request->id,
                "product_name" => $product_name,
                "product_stock_quantity" => floatval($product_count_available),
                "stock_slug" => $stock->stock_slug,
                "price" =>  $currency === 'euro' ? floatval($product->euro_price) : floatval($product->price) , 
                "qty" => 1,
                "currency" => $currency,
                "user_id" => $request->user_id,
                "language" => $lang,
                "discount" => floatval($product->discount),
                "status" => $product->status,
                "cart_date" => date('Y-m-d H:i:s'),
                "product_img" => $image->product_image,
                "tax" => floatval($tax->rate),
                "shop_id" => 6,
                
            ];
                session()->put('cart', $cart);
                
                //compta

                $multiple_currencies_in_same_orders=$this->compta($cart, $currency );

                    // dd($multiple_currencies_in_same_orders);

                   if(!$multiple_currencies_in_same_orders) {

                       return redirect()->back()->with('success', $response );
                   }else{
                         return redirect()->back()->with('fail', $multiple_currency);
                   }


           }
           
        }

    }

    public function compta($cart, $currency ){

        // init calculation
        $totat_qty=0;
        $totat_qty=0;
        $totat_price_ht=0;
        $totat_discount=0;
        $total_taxes=0;
        $total_before_coupon=0;
        $coupon_value=0;
        $shipment_fee=0;
        $total_ttc=0;
        $multiple_currencies_in_same_orders=false;

        //compta

        foreach($cart as $id=>$info){

           if($info['currency'] !== $currency){

                session()->forget('cart');
                session()->forget('compta');
                $multiple_currencies_in_same_orders=true;
                
                break;

               }
            $totat_qty += $info['qty'];
            $totat_price_ht += $info['qty'] * $info['price'];
            $totat_discount += $totat_price_ht * ($info['discount']/100);
            $total_taxes += ($totat_price_ht - $totat_discount  ) * ($info['tax']/100);

        }

        $seuil = (int)Shipping::where('name', 'seuil')->first()->pluck('rate')[2];
        $shipping_fixe = (int)Shipping::where('name', 'fixe')->first()->pluck('rate')[0];

        $total_before_coupon= ($totat_price_ht - $totat_discount) + $total_taxes;
        $shipment_fee = $totat_price_ht > $seuil ? 0 : $shipping_fixe ;
        $total_ttc_before_coupon= ($total_before_coupon + $shipment_fee)  ;

        $compta=[

            'total_qty' => $totat_qty,
            'totat_price_ht' => $currency == 'euro' ? number_format($totat_price_ht,2,',',' ') : number_format($totat_price_ht,2,'.',',') ,
            'totat_discount' => $currency == 'euro' ? number_format($totat_discount,2,',',' ') : number_format($totat_discount,2,'.',',') ,
            'total_taxes' => $currency == 'euro' ? number_format($total_taxes,2,',',' ') : number_format($total_taxes,2,'.',',') ,
            'total_before_coupon' => $currency == 'euro' ? number_format($total_before_coupon,2,',',' ') : number_format($total_before_coupon,2,'.',',') ,
            'shipment_fee'=>  $currency == 'euro' ? number_format($shipment_fee,2,',',' ') : number_format($shipment_fee,2,'.',',') ,
            'total_ttc_before_coupon' => $currency == 'euro' ? number_format($total_ttc,2,',',' ') : number_format($total_ttc,2,'.',',') ,
            'currency' => $currency 
            
        ];


         session()->put('compta', $compta);
        return $multiple_currencies_in_same_orders;

    }

    
    public function showCart(Request $request){
        return view('products.cart',['language'=>$request->language,'product'=>'product' ]);
    }

    public function clearAllCartItems(Request $request){

           if(session()->exists('cart')){
           // dd('cart session exist');
                session()->forget('cart');
                session()->forget('compta');
                return redirect()->back()->with('success', 'all shoping cart items are deleted');

           }else{
            //dd('no cart session');
            return redirect()->back()->with('fail', 'your shoping cart already empty');
           }

    }//end function

    public function updateCartItemQty(Request $request){

        $currency= $request->currency;
       
       $lang= $request->language;

        if($lang==='fr'){

            
            $response= 'Produit ajouté avec succes';
            $multiple_currency='plusieurs devises dans la même commande sont interdites';
            $stock_threshhold='Limite de stock veuillez contacter le responsable du stock HITCOM';

      }elseif($lang==='en'){

             
             $response= 'New Item added to basket successfully';
             $multiple_currency='multiple currency in the same order is forbidden';
             $stock_threshhold='Stock limit please contact HITCOM stock manager';

      }else{
          
          
          $response= 'اضافة المنتج بنجاح';
          $multiple_currency='يحظر تعدد العملات في نفس الترتيب';
          $stock_threshhold='حد المخزون يرجى الاتصال بمدير هيتكوم';

      }
       
       //dd($request->all());
        $cart = session()->get('cart');
        $threshold_flag=0;

        foreach($request->all() as $k=>$v){
            
            $contain_cart = Str::contains($k, 'cart');
          
            if( $contain_cart ){
                 $id = substr($k, 4);
                 $cart[$id]['qty']=$v;

                 if($cart[$id]['qty'] > $cart[$id]["product_stock_quantity"]){
                   
                    $threshold_flag=1;
                    break;
                 }
            }
        }

        if($threshold_flag === 0 ){
                   
            session()->put('cart', $cart);

           }else{

            return redirect()->back()->with('fail', $stock_threshhold );
         }
        
        
        $multiple_currencies_in_same_orders=$this->compta($cart, $request->currency );
        return redirect()->back()->with('success', $response);

    }//end function
        
        
    public function deleteCartItem(Request $request){

       //dd($request->product_id);

         $cart =session()->get('cart');
        unset($cart[$request->product_id]);
        session()->put('cart', $cart);
        $cart =session()->get('cart');
        $multiple_currencies_in_same_orders=$this->compta($cart, $request->currency );
        return redirect()->back()->with('success', 'cart item removed with success ');


    }//end function
        
        



        
       
    
}//endclass
