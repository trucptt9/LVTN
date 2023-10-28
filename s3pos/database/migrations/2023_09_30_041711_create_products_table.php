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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->float('price')->nullable()->default(1);
            $table->float('cost')->nullable()->default(0);
            $table->string('description')->nullable();
            $table->boolean('is_menu')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
