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
        //
        Schema::create('betslips', function(Blueprint $table){
            $table->increments('id');
            $table->bigInteger('bet_id');
            $table->string('team_1');
            $table->string('team_2');
            $table->string('football_league');
            $table->string('pick');
            $table->string('odds');
            $table->string('total_odds');
            $table->string('amount');
            $table->string('payout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('betslips');
    }
};
