<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerMoreInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('player_more_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id');
            $table->string('picture')->nullable();
            $table->integer('years')->nullable();
            $table->string('nationality')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('position')->nullable();
            $table->integer('shirt_number')->nullable()->unique();
            $table->date('contract_ends')->nullable();
            $table->string('foot')->nullable();
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
        Schema::dropIfExists('player_more_informations');
    }
}
