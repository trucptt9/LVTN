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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('store_id')->index();
            $table->unsignedBigInteger('department_id')->index()->nullable();
            $table->unsignedBigInteger('position_id')->index()->nullable();
            $table->string('code')->unique()->index();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable()->unique()->index();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->default('other');
            $table->enum('is_supper', ['true', 'false'])->nullable()->default('false');
            $table->enum('status', ['active', 'blocked', 'un_active'])->index()->nullable()->default('un_active');
            $table->string('description')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
