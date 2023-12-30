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
            $table->id();
            $table->timestamps();
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('seller_id');
            $table->text('product_description');
            $table->float('product_price');
            $table->string('product_color');
            $table->string('product_brand')->nullable();
            $table->string('product_model')->nullable();
            $table->string('origin_country');
            $table->integer('stock');
            $table->string('product_image');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('seller_id')->references('id')->on('users');
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
