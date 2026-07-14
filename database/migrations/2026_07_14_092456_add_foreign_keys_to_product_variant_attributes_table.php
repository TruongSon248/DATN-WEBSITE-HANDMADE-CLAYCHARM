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
        Schema::table('product_variant_attributes', function (Blueprint $table) {
            $table->foreign(['attribute_value_id'], 'fk_variant_attribute_value')->references(['id'])->on('attribute_values')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['product_variant_id'], 'fk_variant_attribute_variant')->references(['id'])->on('product_variants')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variant_attributes', function (Blueprint $table) {
            $table->dropForeign('fk_variant_attribute_value');
            $table->dropForeign('fk_variant_attribute_variant');
        });
    }
};
