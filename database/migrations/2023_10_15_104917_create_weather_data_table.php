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
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->unsignedBigInteger('city_id');
            $table->decimal('temperature', 5, 2);
            $table->decimal('longitude', 5, 2);
            $table->decimal('latitude', 5, 2);
            $table->integer('humidity');
            $table->decimal('pressure', 5, 2);
            $table->timestamps(); // created_at and updated_at timestamps

            // Define the foreign key relationship
            $table->foreign('city_id')->references('id')->on('cities');

            //Adding index
            $table->index(['city_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_data');
    }
};
