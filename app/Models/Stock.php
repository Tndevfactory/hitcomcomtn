<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stock_name',
        'stock_slug',
        'color',
        'dimension',
        'weight',
        'constructor',
        'motif',
        
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
