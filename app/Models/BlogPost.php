<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    /** @use HasFactory<\Database\Factories\BlogPostFactory> */
    use HasFactory;

    protected $fillable = [
    'category_id',
    'user_id',
    'title',
    'slug',
    'summary',
    'content',
    'thumbnail',
    'status',
];
 protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Danh mục
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'category_id');
    }

    /**
     * Người viết
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
