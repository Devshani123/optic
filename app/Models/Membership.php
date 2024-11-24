<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Model
{
    use HasFactory;

    protected $primaryKey = 'membership_id';  // Define the primary key if it's different from the default 'id'
    

    protected $fillable = ['id', 'club_id']; 

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Club model
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    // Define the relationship with the Participant model
    public function participants()
    {
        return $this->hasMany(Participant::class, 'membership_id');
    }
}
