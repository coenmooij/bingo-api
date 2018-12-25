<?php

namespace App\Game;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string session_id
 * @property int pin
 * @property string balls
 */
class Game extends Model
{
    protected $table = 'games';
}
