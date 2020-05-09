<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('player_id')->nullable()->unsigned();
            $table->integer('matches')->nullable();
            $table->integer('run')->nullable();
            $table->integer('highest_score')->nullable();
            $table->integer('fifties')->nullable();
            $table->integer('hundreds')->nullable();
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players_history');
    }
}
