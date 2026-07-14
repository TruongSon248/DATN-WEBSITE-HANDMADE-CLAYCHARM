<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;

    protected $fillable = [
    'cart_id',
    'product_variant_id',
    'quantity',
    'price',
    'total_price',
];
 protected $casts = [
        'price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Giỏ hàng
     */
    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cart_id');
    }

    /**
     * Variant sản phẩm
     */
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    /**
     * Truy cập nhanh Product
     */
    public function product()
    {
        return $this->hasOneThrough(
            Product::class,
            ProductVariant::class,
            'id',
            'id',
            'product_variant_id',
            'product_id'
        );
    }
}
