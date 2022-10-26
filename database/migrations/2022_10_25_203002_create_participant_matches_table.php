<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tournament_id')->nullable();
            $table->bigInteger('team1_id')->nullable();
            $table->bigInteger('team2_id')->nullable();
            $table->bigInteger('participant_id')->nullable();
            $table->bigInteger('win_id')->nullable();
            $table->string('goal1')->nullable();
            $table->string('goal2')->nullable();
            $table->string('type')->nullable();
            $table->string('sr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participant_matches');
    }
}
