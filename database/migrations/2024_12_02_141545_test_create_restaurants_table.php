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
        Schema::create('test-restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40)->nullable(false);
            $table->string('address', 200)->nullable(false);
            $table->string('piva', 11)->nullable(false)->unique();
            $table->text('logo', 40)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test-restaurants');
    }
};
