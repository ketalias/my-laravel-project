<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentParticipant extends Model
{
    use HasFactory;

    protected $table = 'tournament_participants';

    protected $fillable = [
        'name',
        'gender',
        'age',
        'country',
        'scores',
    ];

    protected $casts = [
        'scores' => 'array',
    ];
}

