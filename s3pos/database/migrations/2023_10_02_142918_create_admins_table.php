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
            $table->string('avatar');
            $table->string('phone');
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->integer('gender')->nullable()->default(3);
            $table->boolean('is_supper')->nullable()->default(false);
            $table->boolean('is_root')->nullable()->default(false);
            $table->timestamp('last_login')->nullable();
            $table->integer('status')->nullable()->default(1);
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
