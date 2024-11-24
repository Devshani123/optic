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
        Schema::create('participants', function (Blueprint $table) {
            $table->id('participant_id');
            
            // Foreign key to the memberships table
            $table->foreignId('membership_id')->constrained()->onDelete('cascade');
            
            // Explicitly defining event_id as unsignedBigInteger
            $table->unsignedBigInteger('event_id');
            
            // Foreign key constraint for event_id referencing the events table
            $table->foreign('event_id')->references('event_id')->on('events')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
