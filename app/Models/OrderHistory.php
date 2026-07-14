<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    /** @use HasFactory<\Database\Factories\OrderHistoryFactory> */
    use HasFactory;

    protected $fillable = [
    'order_id',
    'old_status_id',
    'new_status_id',
    'updated_by',
    'note',
];
public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function oldStatus()
    {
        return $this->belongsTo(OrderStatus::class,'old_status_id');
    }

    public function newStatus()
    {
        return $this->belongsTo(OrderStatus::class,'new_status_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}
