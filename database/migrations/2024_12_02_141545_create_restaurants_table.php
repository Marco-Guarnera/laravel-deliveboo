<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(
            'restaurants',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->string('name');
                $table->string('address');
                $table->char('piva', 11);
                $table->text('logo')->nullable();
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
