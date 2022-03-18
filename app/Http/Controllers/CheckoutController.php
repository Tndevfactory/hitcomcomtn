<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function viewOrderInvoice(Request $request){

       // dd($request->all(), session()->get('compta') ,session()->get('cart')  );

        

        $lang= $request->language;

        if($lang==='fr'){
 
              $empty_order = 'Votre commande est vide';
              $not_logged = 'Vous n\'êtes pas authentifié, veuillez vous connecter pour terminer la commande';
              $not_valid_coupon = 'Coupon non valide, veuillez contacter l\'administrateur';
 
        }elseif($lang==='en'){
 
               $empty_order = 'Your order is empty';
               $not_logged = 'Your are not authentified, please login to complete order';
               $not_valid_coupon = 'not a valid coupon, please contact admin for any concern ';
 
        }else{
 
              $empty_order = 'طلبك فارغ';
              $not_logged = 'لم يتم المصادقة الخاصة بك ، الرجاء تسجيل الدخول لإكمال الطلب';
              $not_valid_coupon = 'قسيمة غير صالحة ، الرجاء الاتصال بالمسؤول';
 
        }


        $shipping_address = $request->shipping_address;
       // dd($shipping_address );

        $coupon_code = $request->coupon_code ;

        $user = Auth::user();

        $cart = session()->get('cart');

        $compta = session()->get('compta');
      
        $total_ttc_before_coupon = floatval($compta['total_ttc_before_coupon']);
        $currency = $compta['currency'];

       
        if( !isset($user)){
            return redirect()->back()->with('fail', $not_logged);

           }else{
               
            
            if(isset($shipping_address)) {
                
                $address=$shipping_address;
               
                //dd($address);

            }else{

                $address=Auth::user()->address;
                //dd($address);
            }       
           }


        if( !isset($compta)){
            return redirect()->back()->with('fail', $empty_order);
        }


       if( isset($coupon_code)){

        $coupon_found_active = Coupon::where('coupon_name', $coupon_code)->where('active','1')->first();

        // test active
        if( isset($coupon_found_active)){

                $coupon_reduction_rate = (float)($coupon_found_active->reduction_rate/100);
                

                if( $coupon_reduction_rate === 0.00){

                    $total_ttc = $total_ttc_before_coupon ;
                    
                   

                }else{
                    
                    
                    $coupon_amount= $total_ttc_before_coupon * $coupon_reduction_rate ;

                    $total_ttc = $total_ttc_before_coupon - $coupon_amount;
                    //dd($coupon_amount);
                }


        }else{

           // dd( 'not a valid coupon, please contact admin for any concern ');
            $total_ttc = $total_ttc_before_coupon ;
          

        }

       }

       
            
        return view('orders.invoice');
    }
}
