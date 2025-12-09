<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = DB::table('teams')->pluck('id', 'name');
        $competitions = DB::table('competitions')->pluck('id', 'name');

        DB::table('matches')->insert([
            [
                'id' => Str::uuid(),
                'competition_id' => $competitions['Premier League'],
                'home_team_id' => $teams['Manchester United'],
                'away_team_id' => $teams['Manchester City'],
                'status_id' => 1,
                'match_time' => time(),
                'home_scores' => json_encode([0, 0, 0, 0, -1, 0, 0]),
                'away_scores' => json_encode([0, 0, 0, 0, -1, 0, 0]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'competition_id' => $competitions['La Liga'],
                'home_team_id' => $teams['Barcelona'],
                'away_team_id' => $teams['Manchester United'],
                'status_id' => 1,
                'match_time' => time() + 3600,
                'home_scores' => json_encode([0, 0, 0, 0, -1, 0, 0]),
                'away_scores' => json_encode([0, 0, 0, 0, -1, 0, 0]),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
