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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('store_id')->index();
            $table->unsignedBigInteger('table_id')->index()->nullable();
            $table->unsignedBigInteger('customer_id')->index()->nullable();
            $table->string('code')->unique()->index();
            $table->string('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('phone')->nullable();
            $table->string('note')->nullable();
            $table->timestamp('date_start')->nullable();
            $table->enum('status', ['tmp', 'finish', 'destroy'])->index()->nullable()->default('tmp');
            $table->json('items')->nullable();
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};