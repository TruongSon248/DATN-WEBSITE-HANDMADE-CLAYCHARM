<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
    'order_number',
    'user_id',
    'customer_name',
    'customer_email',
    'customer_phone',
    'shipping_address',
    'payment_method',
    'payment_status',
    'subtotal',
    'shipping_fee',
    'discount',
    'total_amount',
    'status_id',
    'promotion_id',
    'tracking_code',
    'note',
];
 protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_fee' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class,'status_id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function histories()
    {
        return $this->hasMany(OrderHistory::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
