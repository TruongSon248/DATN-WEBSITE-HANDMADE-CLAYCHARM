<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    /** @use HasFactory<\Database\Factories\BlogCategoryFactory> */
    use HasFactory;

    protected $fillable = [
    'category_name',
    'slug',
    'description',
    'status',
];
 protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Danh sách bài viết
     */
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class,'category_id');
    }
}
