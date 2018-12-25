<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('game_id')->unsigned();
            $table->string('card');
            $table->timestamps();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
}
