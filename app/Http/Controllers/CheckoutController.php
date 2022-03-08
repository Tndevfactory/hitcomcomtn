<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function viewOrderInvoice(Request $request){

        // "coupon_code" => null
        // "shipping_address" => "saved_shipping_address"

        // "total_qty" => 1
        // "totat_price_ht" => "1 021,56"
        // "totat_discount" => "194,10"
        // "total_taxes" => "157,22"
        // "total_before_coupon" => "984,68"
       
        // "currency" => "euro"

        // $coupon_value=10;
        // $shipment_fee=8;
        // $total_ttc= ($total_before_coupon + $shipment_fee) - $coupon_value ;
        // 'total_ttc' => $currency == 'euro' ? number_format($total_ttc,2,',',' ') : number_format($total_ttc,2,'.',',') ,

        session()->get('compta');
        dd($request->all(), session()->get('compta') );
        return view('orders.invoice');
    }
}
