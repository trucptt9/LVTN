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
        Schema::create('port_payments', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('method_id')->index();
            $table->string('code');
            $table->string('name');
            $table->boolean('status')->nullable()->default(false);
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('method_id')->references('id')->on('method_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('port_payments');
    }
};
