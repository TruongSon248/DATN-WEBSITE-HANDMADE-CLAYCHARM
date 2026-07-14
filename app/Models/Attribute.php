<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /** @use HasFactory<\Database\Factories\AttributeFactory> */
    use HasFactory;

    protected $fillable = [
    'attribute_name',
    'description',
    'sort_order',
    'status',
];
protected $casts = [
        'status' => 'boolean',
    ];

    // Một thuộc tính có nhiều giá trị
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
