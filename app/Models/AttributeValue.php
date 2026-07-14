<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    /** @use HasFactory<\Database\Factories\AttributeValueFactory> */
    use HasFactory;

    protected $fillable = [
    'attribute_id',
    'value',
    'sort_order',
    'status',
];
 protected $casts = [
        'status' => 'boolean',
    ];

    // Thuộc tính cha
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    // Pivot với Product Variant
    public function variantAttributes()
    {
        return $this->hasMany(ProductVariantAttribute::class);
    }

    // Các variant sử dụng giá trị này
    public function variants()
    {
        return $this->belongsToMany(
            ProductVariant::class,
            'product_variant_attributes',
            'attribute_value_id',
            'product_variant_id'
        );
    }
}
