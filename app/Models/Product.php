<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'category_id',
        'product_name',
        'slug',
        'sku',
        'short_description',
        'description',
        'price',
        'sale_price',
        'qty',
        'thumbnail',
        'is_featured',
        'status'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}