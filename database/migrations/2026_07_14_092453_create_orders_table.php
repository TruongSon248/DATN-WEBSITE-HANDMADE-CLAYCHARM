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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number', 50)->unique('order_number');
            $table->unsignedBigInteger('user_id')->nullable()->index('fk_orders_user');
            $table->string('customer_name', 100);
            $table->string('customer_email')->nullable();
            $table->string('customer_phone', 20)->nullable();
            $table->text('shipping_address');
            $table->enum('payment_method', ['cod', 'bank_transfer', 'momo', 'vnpay'])->nullable()->default('cod');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->nullable()->default('pending');
            $table->decimal('subtotal', 10);
            $table->decimal('shipping_fee', 10)->nullable()->default(0);
            $table->decimal('discount', 10)->nullable()->default(0);
            $table->decimal('total_amount', 10);
            $table->unsignedBigInteger('status_id')->index('fk_orders_status');
            $table->unsignedBigInteger('promotion_id')->nullable()->index('fk_orders_promotion');
            $table->string('tracking_code', 100)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
