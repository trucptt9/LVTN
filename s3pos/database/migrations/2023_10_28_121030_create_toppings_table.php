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
        Schema::create('toppings', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('group_id')->index();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('price')->nullable()->default(0);
            $table->integer('cost')->nullable()->default(0);
            $table->enum('status', ['active', 'blocked'])->index()->nullable()->default('blocked');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('topping_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toppings');
    }
};
