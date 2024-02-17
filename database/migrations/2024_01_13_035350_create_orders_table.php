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
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_variation_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('delivery_address_id');
            $table->integer('quantity')->default(1);
            $table->double('price_per_item');
            $table->double('total_price');
            $table->enum('status', ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'])->default('Pending');
            $table->enum('payment_status',['Unpaid', 'Paid'])->default('Unpaid');
            $table->string('payment_method');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->foreign('delivery_address_id')->references('id')->on('delivery_addresses');
            $table->softDeletes();
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
