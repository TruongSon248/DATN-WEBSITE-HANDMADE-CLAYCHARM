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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_variant_id')->index('fk_cart_items_variant');
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10);
            $table->decimal('total_price', 10);
            $table->timestamps();

            $table->unique(['cart_id', 'product_variant_id'], 'uk_cart_variant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
