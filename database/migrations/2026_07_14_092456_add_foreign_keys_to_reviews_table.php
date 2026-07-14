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
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign(['product_id'], 'fk_review_product')->references(['id'])->on('products')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'fk_review_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['order_item_id'], 'reviews_ibfk_1')->references(['id'])->on('order_items')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('fk_review_product');
            $table->dropForeign('fk_review_user');
            $table->dropForeign('reviews_ibfk_1');
        });
    }
};
