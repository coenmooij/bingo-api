<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGamesTable extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('invite_only');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->boolean('invite_only');
        });
    }
}
