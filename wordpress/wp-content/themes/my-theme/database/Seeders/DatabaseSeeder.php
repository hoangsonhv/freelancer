<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
//            CountriesSeeder::class,
//            CompetitionsSeeder::class,
//            TeamsSeeder::class,
            MatchesSeeder::class,
        ]);
    }
}
