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
        Schema::create('stores', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('business_type_id')->index();
            $table->string('code')->index()->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->boolean('status')->index()->nullable()->default(false);
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('business_type_id')->references('id')->on('business_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
