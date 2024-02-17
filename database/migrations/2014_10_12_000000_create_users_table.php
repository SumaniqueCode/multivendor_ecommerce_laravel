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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('phone')->unique();
            $table->enum('gender',['Male', 'Female', 'Others']);
            $table->date('date_of_birth');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image');
            $table->string('address');
            $table->enum('role',['Admin','Seller', 'User'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
