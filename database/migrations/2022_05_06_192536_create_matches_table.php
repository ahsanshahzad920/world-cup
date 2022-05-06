<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id')->nullable();
            $table->bigInteger('team1')->nullable();
            $table->bigInteger('team2')->nullable();
            $table->integer('point1')->nullable();
            $table->integer('point2')->nullable();
            $table->integer('goal1')->nullable();
            $table->integer('goal2')->nullable();
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
        Schema::dropIfExists('matches');
    }
}
