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
        Schema::create('sale_sources', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('store_id')->index();
            $table->string('code');
            $table->string('name');
            $table->enum('default', ['true', 'false'])->nullable()->default('false');
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
        Schema::dropIfExists('sale_sources');
    }
};
