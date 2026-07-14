<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
    'sku',
    'thumbnail',
    'category_id',
    'product_name',
    'slug',
    'short_description',
    'description',
    'base_price',
    'material',
    'style',
    'theme',
    'stock_quantity',
    'weight',
    'status',
    'is_featured',
    'view_count',
    'sold_count',
];
protected $casts = [
        'base_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'status' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Variants
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Promotions
    public function promotionProducts()
    {
        return $this->hasMany(PromotionProduct::class);
    }
}
