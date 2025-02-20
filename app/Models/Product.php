<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'image','size'];

    protected $casts = [
        'size' => 'array', 
    ];
    public function category()  {
        return $this->belongsToMany(Category::class,'category_product');
        
    }
}