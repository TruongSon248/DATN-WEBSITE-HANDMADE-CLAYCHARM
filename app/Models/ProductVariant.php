<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariantFactory> */
    use HasFactory;

    protected $fillable = [
    'product_id',
    'sku',
    'variant_name',
    'price',
    'stock',
    'image',
    'status',
];
protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];

    // Sản phẩm cha
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Pivot Attribute
    public function variantAttributes()
    {
        return $this->hasMany(ProductVariantAttribute::class);
    }

    // Các giá trị thuộc tính
    public function attributeValues()
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'product_variant_attributes',
            'product_variant_id',
            'attribute_value_id'
        );
    }

    // Cart Items
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Order Items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
