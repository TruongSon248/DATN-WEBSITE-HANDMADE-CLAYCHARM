<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantAttribute extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariantAttributeFactory> */
    use HasFactory;

    protected $fillable = [
    'product_variant_id',
    'attribute_value_id',
];
public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    // Giá trị thuộc tính
    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class);
    }
}
