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
        Schema::create('discount_vouchers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->float('discount_rate');
            $table->float('discount_min_spend');
            $table->float('discount_max');
            $table->string('voucher_name');
            $table->float('voucher_discount');
            $table->float('voucher_min_spend');
            $table->float('voucher_max_discount');
            $table->dateTime('validity_start');
            $table->dateTime('validity_end');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_vouchers');
    }
};
