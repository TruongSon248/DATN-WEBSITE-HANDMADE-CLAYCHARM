<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->foreign(['category_id'], 'fk_blog_category')->references(['id'])->on('blog_categories')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'fk_blog_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign('fk_blog_category');
            $table->dropForeign('fk_blog_user');
        });
    }
};
