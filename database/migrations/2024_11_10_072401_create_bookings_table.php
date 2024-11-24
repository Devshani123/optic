<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() :void 
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('payment', 8, 2);
            $table->foreignId('club_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('venue_id'); // Manually declare the venue_id column type
            $table->foreign('venue_id')->references('venue_id')->on('venues')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
