<?php

namespace App\Player;

use App\Game\Game;

class PlayerService
{
    public function get(string $gameId, string $sessionId)
    {
        Game::where('session_id', $sessionId)->where('id', $gameId)->firstOrFail();

        return Player::where('game_id', $gameId)->get();
    }

    public function joinGame(string $pin, string $name): array
    {
        $game = Game::where('pin', $pin)->firstOrFail();
        $player = new Player();
        $player->game_id = $game->id;
        $player->name = $name;
        $card = $this->generateCard();
        $player->card = $card;
        $player->saveOrFail();

        return [
            ['title' => $game->title, 'id' => $game->id],
            $player
        ];
    }

    public function generateCard(): string
    {
        $card = [];
        for ($i = 0; $i < 5; $i++) {
            $start = ($i * 15) + 1;
            $end = $start + 14;
            $balls = range($start, $end);
            shuffle($balls);
            $balls = array_slice($balls, 0, 5);
            sort($balls);
            $card[] = $balls;
        }

        return json_encode($card);
    }
}
