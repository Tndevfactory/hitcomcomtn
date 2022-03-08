<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Commentseller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ratingseller extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
       
       
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function commentseller(){
        return $this->hasOne(Commentseller::class);
    }
}
