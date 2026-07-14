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
        Schema::table('promotion_products', function (Blueprint $table) {
            $table->foreign(['product_id'], 'fk_product_promotion')->references(['id'])->on('products')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['promotion_id'], 'fk_promotion_product')->references(['id'])->on('promotions')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotion_products', function (Blueprint $table) {
            $table->dropForeign('fk_product_promotion');
            $table->dropForeign('fk_promotion_product');
        });
    }
};
