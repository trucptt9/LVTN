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
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id()->index();
            $table->string('code')->nullable();
            $table->integer('parent_id')->nullable()->default(0);
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->enum('status', ['active', 'blocked'])->index()->nullable()->default('blocked');
            $table->integer('numering')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_menus');
    }
};
