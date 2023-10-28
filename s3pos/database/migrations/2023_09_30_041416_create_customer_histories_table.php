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
        Schema::create('customer_histories', function (Blueprint $table) {
            $table->id()->index();
            $table->string('code')->unique()->index();
            $table->unsignedBigInteger('customer_id')->index();
            $table->integer('type')->index()->nullable()->default(1);
            $table->integer('point')->nullable()->default(0);
            $table->string('note')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_histories');
    }
};
