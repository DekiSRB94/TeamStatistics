<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id');
            $table->string('competition_name')->nullable();
            $table->year('year')->nullable();
            $table->integer('goals')->nullable();
            $table->integer('assists')->nullable();
            $table->integer('matches_played')->nullable();
            $table->integer('minutes_played')->nullable();
            $table->integer('red_cards')->nullable();
            $table->integer('yellow_cards')->nullable();
            $table->timestamps();
            $table->unique(['player_id', 'competition_name', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_statistics');
    }
}
