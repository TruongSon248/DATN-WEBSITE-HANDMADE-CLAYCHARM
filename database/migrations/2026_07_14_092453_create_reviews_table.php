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
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('fk_review_user');
            $table->unsignedBigInteger('order_item_id')->nullable()->index('order_item_id');
            $table->boolean('is_verified')->nullable()->default(false);
            $table->unsignedBigInteger('product_id')->index('fk_review_product');
            $table->tinyInteger('rating')->nullable();
            $table->string('title', 200)->nullable();
            $table->text('content')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->nullable()->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
