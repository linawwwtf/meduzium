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
        Schema::create('ticket_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('adult_weekday_price')->default(1100);
            $table->integer('adult_weekend_price')->default(950);
            $table->integer('child_weekday_price')->default(850);
            $table->integer('child_weekend_price')->default(650);
            $table->integer('group_price')->default(800); // Групповой билет
            $table->integer('group_min_people')->default(5); // Минимум для группового
            $table->integer('school_group_price')->default(700); // Школьные группы
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_prices');
    }
};
