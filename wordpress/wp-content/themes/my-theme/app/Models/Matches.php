<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    protected $table = 'matches';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'home_scores' => 'array',
        'away_scores' => 'array',
        'match_time'  => 'integer',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function status()
    {
        return match($this->status_id) {
            1 => 'Not started',
            2 => 'First half',
            3 => 'Half-time',
            4 => 'Second half',
            5 => 'Overtime',
            7 => 'Penalty',
            8 => 'End',
            9 => 'Delay',
            default => '',
        };
    }
}
