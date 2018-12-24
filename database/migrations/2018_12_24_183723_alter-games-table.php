<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGamesTable extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('code');
            $table->integer('pin')->unsigned()->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->integer('code')->unsigned()->default(0);
        });
    }
}
