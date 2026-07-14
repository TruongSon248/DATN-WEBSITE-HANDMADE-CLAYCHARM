<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
    'full_name',
    'username',
    'email',
    'phone',
    'avatar',
    'gender',
    'birthday',
    'email_verified_at',
    'role',
    'status',
    'password',
    'remember_token',
];
protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthday' => 'date',
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    // Address
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    // Cart
    public function carts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    // Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Blog Posts
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }

    // Order Histories
    public function orderHistories()
    {
        return $this->hasMany(OrderHistory::class, 'updated_by');
    }
}

