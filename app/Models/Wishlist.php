<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /** @use HasFactory<\Database\Factories\WishlistFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /**
     * Người dùng
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
}
