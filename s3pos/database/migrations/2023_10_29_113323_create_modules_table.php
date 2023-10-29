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
        Schema::create('modules', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('group_id')->index();
            $table->string('code')->index()->unique();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->integer('numering')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('module_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
