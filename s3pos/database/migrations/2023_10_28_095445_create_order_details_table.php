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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('order_id')->index();
            $table->integer('parent_id')->nullable()->default(0);
            $table->integer('item_id')->index();
            $table->integer('quantity')->nullable()->default(1);
            $table->string('note')->nullable();
            $table->integer('total')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
