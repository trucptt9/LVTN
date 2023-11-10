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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->index();
            $table->string('code')->unique()->index();
            $table->unsignedBigInteger('table_id')->index()->nullable();
            $table->unsignedBigInteger('customer_id')->index()->nullable();
            $table->unsignedBigInteger('method_payment_id')->index()->nullable();
            $table->unsignedBigInteger('sale_source_id')->index()->nullable();
            $table->unsignedBigInteger('promotion_id')->index()->nullable();
            $table->unsignedBigInteger('staff_id')->index()->nullable();
            $table->unsignedBigInteger('store_id')->index();
            $table->dateTime('order_start');
            $table->dateTime('order_end')->nullable();
            $table->integer('vat')->nullable()->default(0);
            $table->integer('vat_total')->nullable()->default(0);
            $table->integer('discount')->nullable()->default(0);
            $table->enum('discount_type', ['vnd', 'percent'])->nullable()->default('percent');
            $table->float('discount_total')->nullable()->default(0);
            $table->integer('sub_total')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
            $table->string('description')->nullable();
            $table->enum('status', ['tmp', 'finish', 'destroy'])->index()->nullable()->default('tmp');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
