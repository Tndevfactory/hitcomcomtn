<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fr_category_name',
        'en_category_name',
        'ar_category_name',
        'category_slug'
       
    ];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
