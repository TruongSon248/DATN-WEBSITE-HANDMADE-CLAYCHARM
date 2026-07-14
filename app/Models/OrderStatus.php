<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    /** @use HasFactory<\Database\Factories\OrderStatusFactory> */
    use HasFactory;

    protected $fillable = [
    'status_name',
    'description',
    'color',
];
 public function orders()
    {
        return $this->hasMany(Order::class,'status_id');
    }

    public function oldHistories()
    {
        return $this->hasMany(OrderHistory::class,'old_status_id');
    }

    public function newHistories()
    {
        return $this->hasMany(OrderHistory::class,'new_status_id');
    }
}
