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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('flight_id');
            $table->string('aircraft_id');
            $table->string('departure_airport');
            $table->string('arrival_airport');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->string('flight_duration');

            // Chỉ định hai cột làm khóa chính
            $table->primary(['flight_id', 'aircraft_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
