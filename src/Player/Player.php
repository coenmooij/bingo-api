<?php

namespace App\Player;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string game_id
 * @property string name
 * @property string card
 */
class Player extends Model
{
    protected $table = 'players';
}
