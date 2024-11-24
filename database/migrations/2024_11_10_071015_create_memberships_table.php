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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id('membership_id');
            $table->date('join_date');
            $table->decimal('membership_fee', 8, 2);
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->foreignId('club_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
