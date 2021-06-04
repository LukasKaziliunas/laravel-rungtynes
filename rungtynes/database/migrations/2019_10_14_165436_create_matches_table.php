<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->time('time');
            $table->date('date');
            $table->string('place');
            $table->integer('team1')->unsigned();
            $table->integer('team2')->unsigned();
            $table->integer('sport')->unsigned();
            $table->foreign('team1')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('sport')->references('id')->on('sports')->onDelete('cascade');
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
