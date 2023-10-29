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
        Schema::create('bill_services', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('license_id')->index();
            $table->string('code')->unique();
            $table->integer('discount')->nullable()->default(0);
            $table->integer('discount_type')->nullable()->default(1);
            $table->integer('sub_total')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
            $table->string('description')->nullable();
            $table->integer('status_payment')->nullable()->default(1);
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_services');
    }
};
