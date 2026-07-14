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
        Schema::table('order_histories', function (Blueprint $table) {
            $table->foreign(['new_status_id'], 'fk_history_new_status')->references(['id'])->on('order_statuses')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['old_status_id'], 'fk_history_old_status')->references(['id'])->on('order_statuses')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['order_id'], 'fk_history_order')->references(['id'])->on('orders')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['updated_by'], 'fk_history_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_histories', function (Blueprint $table) {
            $table->dropForeign('fk_history_new_status');
            $table->dropForeign('fk_history_old_status');
            $table->dropForeign('fk_history_order');
            $table->dropForeign('fk_history_user');
        });
    }
};
