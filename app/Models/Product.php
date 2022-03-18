<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Subcategory;
use App\Models\Ratingproduct;
use App\Models\Commentproduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fr_product_name',
        'en_product_name',
        'ar_product_name',

        'product_slug',

        'fr_description',
        'en_description',
        'ar_description',

        'price',
        'discount',
        
        
        'status',
       
    ];

    public function getEuroPriceAttribute(){

        $currency = DB::table('currencies')->where('name','euro')->first();
        return $this->price * $currency->value_in_dollar;
        
    }

   public function subcategory(){

       return $this->belongsTo(Subcategory::class);
   }
   public function stock(){

       return $this->belongsTo(Stock::class);
   }

   public function images(){
    return $this->hasMany(Image::class);
    }

   public function ratingproducts(){
    return $this->hasMany(Ratingproduct::class);
    }
   public function commentproducts(){
    return $this->hasMany(Commentproduct::class);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
        }
    
}
