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
        Schema::create('the_tables', function (Blueprint $table) {
            $table->id();
            $table->string('code'); 
            $table->string('name'); 
            $table->string('type'); 
            $table->integer('seat'); 
            $table->integer('default')->nullable();
            $table->integer('status'); 
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_tables');
    }
};