<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    /** @use HasFactory<\Database\Factories\PromotionFactory> */
    use HasFactory;

    protected $fillable = [
    'promotion_name',
    'promotion_code',
    'description',
    'discount_type',
    'discount_value',
    'minimum_order',
    'start_date',
    'end_date',
    'status',
];
protected $casts = [
        'discount_value' => 'decimal:2',
        'minimum_order' => 'decimal:2',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => 'boolean',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function promotionProducts()
    {
        return $this->hasMany(PromotionProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'promotion_products',
            'promotion_id',
            'product_id'
        );
    }
}
