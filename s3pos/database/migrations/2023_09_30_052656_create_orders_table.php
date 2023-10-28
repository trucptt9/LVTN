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
            $table->unsignedBigInteger('table_id')->index();
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('portal_payment_id')->index();
            $table->unsignedBigInteger('sale_channel_id')->index();
            $table->unsignedBigInteger('promotion_id')->index();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('store_id')->index();
            $table->dateTime('order_start');
            $table->dateTime('order_end');
            $table->integer('vat');
            $table->integer('vat_total')->nullable()->default(0);
            $table->integer('discount')->nullable()->default(0);
            $table->integer('discount_type')->nullable()->default(1);
            $table->float('discount_total')->nullable()->default(0);
            $table->integer('sub_total')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
            $table->string('description')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('portal_payment_id')->references('id')->on('portal_payments')->onDelete('cascade');
            $table->foreign('sale_channel_id')->references('id')->on('sale_channels')->onDelete('cascade');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
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
