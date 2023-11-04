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
        Schema::create('admins', function (Blueprint $table) {
            $table->id()->index();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->default('other');
            $table->enum('is_supper', ['true', 'false'])->index()->nullable()->default('false');
            $table->enum('is_root', ['true', 'false'])->index()->nullable()->default('false');
            $table->timestamp('last_login')->nullable();
            $table->enum('status', ['active', 'blocked'])->index()->nullable()->default('blocked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
