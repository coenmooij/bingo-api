<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('pin')->unsigned()->default(0);
            $table->string('session_id');
            $table->timestamps();
            $table->unique('pin');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
}
