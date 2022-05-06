<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tournament_id')->nullable();
            $table->bigInteger('team1_id')->nullable();
            $table->bigInteger('team2_id')->nullable();
            $table->string('group')->nullable();
            $table->string('city')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('ground')->nullable();
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
        Schema::dropIfExists('groups');
    }
}
