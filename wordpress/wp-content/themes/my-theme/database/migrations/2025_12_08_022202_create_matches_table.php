<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->uuid('home_team_id');
            $table->uuid('away_team_id');
            $table->unsignedTinyInteger('status_id')->comment("1: Not started,2: First half,3: Half-time,4: Second half,5: Overtime,6: Overtime(deprecated),7: Penalty Shoot-out,8: End,9: Delay");
            $table->unsignedBigInteger('match_time');
            $table->json('home_scores')->nullable()->comment('[0: Score (regular time),1: Halftime score,2: Red cards,3: Yellow cards,4: Corners (-1 = no data),5: Overtime score (120m),6: Penalty shootout score]');
            $table->json('away_scores')->nullable()->comment('[0: Score (regular time),1: Halftime score,2: Red cards,3: Yellow cards,4: Corners (-1 = no data),5: Overtime score (120m),6: Penalty shootout score]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
