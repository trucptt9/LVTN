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
        Schema::create('customers', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('brand_id')->index();
            $table->unsignedBigInteger('group_id')->index();
            $table->string('code')->unique()->index();
            $table->string('name');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('point_current');
            $table->integer('status')->index()->nullable()->default(1);
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('customer_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
