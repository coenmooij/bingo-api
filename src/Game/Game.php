<?php

namespace App\Game;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string session_id
 * @property int pin
 */
class Game extends Model
{
    protected $table = 'games';
}
