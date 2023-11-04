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
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('store_id')->index();
            $table->string('code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('type', ['text', 'file', 'select', 'radio'])->index()->nullable()->default('text');
            $table->string('value');
            $table->string('data')->nullable();
            $table->integer('numering')->nullable()->default(0);
            $table->integer('group_id')->index();
            $table->enum('status', ['active', 'blocked'])->index()->nullable()->default('blocked');
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
