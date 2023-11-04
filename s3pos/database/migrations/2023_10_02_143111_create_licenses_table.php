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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('store_id')->index();
            $table->string('key')->unique()->index();
            $table->integer('total_month')->nullable()->default(1);
            $table->timestamp('date_start');
            $table->timestamp('date_end')->nullable();
            $table->integer('total_amount')->nullable()->default(0);
            $table->enum('status', ['un_active', 'active', 'blocked'])->index()->nullable()->default('un_active');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
