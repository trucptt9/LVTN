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
            $table->integer('gender')->nullable()->default(1);
            $table->boolean('is_supper')->nullable()->default(false);
            $table->integer('status')->index()->nullable()->default(1);
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
