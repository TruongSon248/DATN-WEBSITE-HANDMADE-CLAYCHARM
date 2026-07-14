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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['promotion_id'], 'fk_orders_promotion')->references(['id'])->on('promotions')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['status_id'], 'fk_orders_status')->references(['id'])->on('order_statuses')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'fk_orders_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('fk_orders_promotion');
            $table->dropForeign('fk_orders_status');
            $table->dropForeign('fk_orders_user');
        });
    }
};
