<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';  // Define the primary key if it's different from the default 'id'
    
    // Define the relationship with the Club model
    public function club()
    {
        return $this->belongsTo(Club::class);  // Assumes you have a Club model
    }

    // Define the relationship with the Participant model
    public function participants()
    {
        return $this->hasMany(Participant::class, 'event_id');
    }

    // Define the relationship with the Venue model
    public function venue()
    {
        return $this->belongsTo(Venue::class);  // Assumes you have a Venue model
    }
}
