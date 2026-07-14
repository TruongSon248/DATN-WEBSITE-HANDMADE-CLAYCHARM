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
        Schema::create('order_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->index('fk_history_order');
            $table->unsignedBigInteger('old_status_id')->nullable()->index('fk_history_old_status');
            $table->unsignedBigInteger('new_status_id')->index('fk_history_new_status');
            $table->unsignedBigInteger('updated_by')->nullable()->index('fk_history_user');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_histories');
    }
};
