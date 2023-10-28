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
            $table->unsignedBigInteger('type_id')->index();
            $table->string('code')->unique()->index();
            $table->string('name');
            $table->integer('seat')->nullable()->default(1);
            $table->integer('status')->index()->nullable()->default(1);
            $table->timestamps();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('table_types')->onDelete('cascade');
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
