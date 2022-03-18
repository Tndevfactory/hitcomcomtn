<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function shippingConfig(){
        
        $seuil_count = Shipping::where('name', 'seuil')->where('active', '1')->count();

        $shipping_amount_fixed_count = Shipping::where('name', 'shipping_amount_fixed')->where('active', '1')->count();
        $shipping_amount_variable_count = Shipping::where('name', 'shipping_amount_variable')->where('active', '1')->count();
        

        if($seuil_count === 0){

        $seuil = 0;

        }else{

            $seuil= Shipping::where('name', 'seuil')->where('active', '1')->first()->value;
        }

        if($shipping_amount_fixed_count === 0){

            if($shipping_amount_variable_count === 0){

                $shipping_calculation_method =  'no_shipping_method_set ';
                $shipping_amount_value = 0 ;

            }else{

                $shipping_calculation_method =  'shipping_amount_variable';
                $shipping_amount_value =  Shipping::where('name', 'shipping_amount_variable')->where('active', '1')->first()->value;

            } 


        }elseif($shipping_amount_fixed_count === 1){

                $shipping_amount_value = Shipping::where('name', 'shipping_amount_fixed')->where('active', '1')->first()->value;
                $shipping_calculation_method =  'shipping_amount_fixed ';

        }

        
       

       $shippingConfig =[

            'seuil' => $seuil,
            'shipping_calculation_method' => $shipping_calculation_method,
            'shipping_amount_value' => $shipping_amount_value,

        ];

        // dd( $shippingConfig);

        return $shippingConfig;

    }
}
