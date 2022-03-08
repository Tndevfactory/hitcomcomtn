<?php

namespace App\Models;

use App\Models\Ratingseller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentseller extends Model
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

    public function ratingseller(){
        return $this->belongsTo(Ratingseller::class);
    }

}
