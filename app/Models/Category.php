<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
    'parent_id',
    'category_name',
    'slug',
    'description',
    'image',
    'sort_order',
    'status',
];
 protected $casts = [
        'status' => 'boolean',
    ];

    // Parent Category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Child Categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
