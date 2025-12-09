<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Vietnam',
                'logo' => 'vn.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'England',
                'logo' => 'eng.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Spain',
                'logo' => 'esp.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
