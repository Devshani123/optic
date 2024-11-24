<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void 
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('event_name');
            $table->text('description');
            $table->date('event_date');
            $table->time('start_time');
            $table->foreignId('club_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('venue_id'); // Manually declare the venue_id column type
            $table->foreign('venue_id')->references('venue_id')->on('venues')->onDelete('cascade'); // Explicit foreign key constraint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
