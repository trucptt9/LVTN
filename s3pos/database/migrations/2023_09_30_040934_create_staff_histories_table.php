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
        Schema::create('staff_histories', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('staff_id')->index();
            $table->integer('action')->nullable();
            $table->string('link')->nullable();
            $table->text('description');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_histories');
    }
};