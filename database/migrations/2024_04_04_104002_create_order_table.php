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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('adress_id');
            $table->string('total_price');
            $table->dateTime('order_date');
            $table->dateTime('deliver_date');
            $table->boolean('deliver_status')->default(0);
            $table->string('account_number');
            $table->string('transaction_id');
            $table->boolean('payment_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
