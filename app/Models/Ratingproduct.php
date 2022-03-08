<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Commentproduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ratingproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
       
       
    ];

    public function product(){
        return $this->belongsTo(Product::class);
        }

        public function user(){
            return $this->belongsTo(User::class);
        }
        public function commentproduct(){
            return $this->hasOne(Commentproduct::class);
        }

        public function getTimeagoAttribute()
        {
        $date = Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $date;
        }
}
