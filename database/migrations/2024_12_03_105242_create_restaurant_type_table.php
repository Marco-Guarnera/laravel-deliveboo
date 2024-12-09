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
        Schema::create(
            'restaurant_type',
            function (Blueprint $table) {
                $table->primary(['restaurant_id', 'type_id']);
                $table->foreignId('type_id')->constrained('types')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_type');
    }
};
