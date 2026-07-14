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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku', 50)->unique('sku');
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('category_id')->index('category_id');
            $table->string('product_name', 200);
            $table->string('slug', 200)->nullable()->unique('slug');
            $table->string('short_description', 500)->nullable();
            $table->text('description')->nullable();
            $table->decimal('base_price', 10);
            $table->string('material', 100)->nullable();
            $table->string('style', 100)->nullable();
            $table->string('theme', 100)->nullable();
            $table->integer('stock_quantity')->nullable()->default(0);
            $table->decimal('weight')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->boolean('is_featured')->nullable()->default(false);
            $table->integer('view_count')->nullable()->default(0);
            $table->integer('sold_count')->nullable()->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
