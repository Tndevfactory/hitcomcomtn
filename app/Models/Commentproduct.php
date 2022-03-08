<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Ratingproduct;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentproduct extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rating',
        
       
    ];

    public function product(){
        return $this->belongsTo(Product::class);
        }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ratingproduct(){
        return $this->belongsTo(Ratingproduct::class);
    }

    
}
