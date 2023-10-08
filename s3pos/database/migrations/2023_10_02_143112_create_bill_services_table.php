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
            $table->id();
            $table->string('code');
            $table->integer('total'); 
            $table->integer('subtotal');
            $table->integer('discount');
            $table->integer('type_discount');
            $table->date('day_end'); 
            $table->date('day_start');
            $table->string('desscription');
            $table->integer('status_payment');
            $table->integer('status');
            $table->timestamps();
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