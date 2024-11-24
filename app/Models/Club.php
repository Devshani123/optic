<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Club extends Model
{
    use HasFactory;

    // Define the table if it's not the plural of the model name (e.g., 'clubs')
    protected $table = 'clubs';
    protected $primaryKey = 'club_id';

    // Define the fillable attributes
    protected $fillable = [
        'name',          // The name of the club
        'description',
        'club_type',
        'physical_type',
        'main_image',
        'monthly_practice_timetable'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePhysical($query)
    {
        return $query->where('physical_type', 'physical');
    }

    public function scopeNonPhysical($query)
        {
            return $query->where('physical_type', 'non-physical');
        }
}
