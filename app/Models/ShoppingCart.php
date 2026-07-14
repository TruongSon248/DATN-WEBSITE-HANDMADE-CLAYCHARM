<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    /** @use HasFactory<\Database\Factories\ShoppingCartFactory> */
    use HasFactory;

    protected $fillable = [
    'user_id',
    'session_id',
];
/**
     * User sở hữu giỏ hàng
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Danh sách sản phẩm trong giỏ
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    /**
     * Tổng số lượng sản phẩm
     */
    public function getTotalQuantityAttribute()
    {
        return $this->cartItems->sum('quantity');
    }

    /**
     * Tổng tiền giỏ hàng
     */
    public function getTotalAmountAttribute()
    {
        return $this->cartItems->sum('total_price');
    }
}
