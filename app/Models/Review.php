<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
    'user_id',
    'order_item_id',
    'is_verified',
    'product_id',
    'rating',
    'title',
    'content',
    'status',
];
protected $casts = [
        'is_verified' => 'boolean',
    ];

    /**
     * Người đánh giá
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Sản phẩm
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Đơn hàng đã mua
     */
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
