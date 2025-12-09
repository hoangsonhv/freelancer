<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompetitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('competitions')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Premier League',
                'logo' => 'premier.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'La Liga',
                'logo' => 'laliga.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
