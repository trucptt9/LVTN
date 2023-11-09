<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_histories', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->integer('action')->nullable();
            $table->string('link')->nullable();
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_histories');
    }
};