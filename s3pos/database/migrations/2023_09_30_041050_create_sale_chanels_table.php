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
        Schema::create('sale_channels', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('source_id')->index();
            $table->string('code');
            $table->string('name');
            $table->boolean('default')->nullable()->default(false);
            $table->boolean('status')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('source_id')->references('id')->on('sale_sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_channels');
    }
};
