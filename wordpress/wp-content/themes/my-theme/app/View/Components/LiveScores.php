<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Matches;

class LiveScores extends Component
{
    public $groups;

    public function __construct()
    {
        $matches = Matches::with([
            'homeTeam',
            'awayTeam',
            'competition'
        ])
            ->orderBy('competition_id')
            ->orderBy('match_time')
            ->get();

        $this->groups = $matches->groupBy('competition_id');
    }

    public function render()
    {
        return view('components.live-scores');
    }
}
