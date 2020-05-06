<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('team_id')->nullable()->unsigned();
            $table->string('identifier')->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('imageUri');
            $table->string('playerJerseyNumber');
            $table->string('country');
            $table->timestamps();
            //FOREIGN KEY CONSTRAINTS
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
