<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;

    protected $primaryKey = 'participant_id';  // Define the primary key if it's different from the default 'id'

    // Define the relationship with the Membership model
    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_id');
    }

    // Define the relationship with the Event model
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
