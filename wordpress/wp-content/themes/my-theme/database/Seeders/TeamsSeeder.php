<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = DB::table('countries')->pluck('id', 'name');
        $competitions = DB::table('competitions')->pluck('id', 'name');

        DB::table('teams')->insert([
            [
                'id' => Str::uuid(),
                'competition_id' => $competitions['Premier League'],
                'country_id' => $countries['England'],
                'name' => 'Manchester United',
                'logo' => 'mu.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'competition_id' => $competitions['Premier League'],
                'country_id' => $countries['England'],
                'name' => 'Manchester City',
                'logo' => 'mancity.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'competition_id' => $competitions['La Liga'],
                'country_id' => $countries['Spain'],
                'name' => 'Barcelona',
                'logo' => 'barca.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
