<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'fr_shop_name', 
        'en_shop_name', 
        'ar_shop_name', 

        'fr_shop_description',
        'en_shop_description',
        'ar_shop_description',

        'shop_slug',
        'shop_address',
        'city',
        'shop_phone1',
        'shop_phone2',

        'shop_category',
        'shop_creation_date',
        'seller_fiscal_id',

        
        'shop_email',
        'shop_image',
        
        'active',
       
    ];
}
