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
        Schema::create('tables', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('area_id')->index();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('code')->unique()->index();
            $table->string('name');
            $table->integer('seat')->nullable()->default(1);
            $table->enum('status', ['active', 'blocked'])->index()->nullable()->default('blocked');
            $table->enum('status_order', ['active', 'un_active'])->index()->nullable()->default('un_active');
            $table->timestamps();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};