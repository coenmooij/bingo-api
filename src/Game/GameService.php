<?php

namespace App\Game;

class GameService
{
    public function create(string $title): Game
    {
        $game = new Game();
        $game->title = $title;
        $game->pin = $this->generatePin();
        $game->session_id = $this->generateSessionId();
        $game->saveOrFail();

        return $game;
    }

    public function generatePin(): int
    {
        return rand(10000, 99999);
    }

    public function generateSessionId(): string
    {
        return md5(rand());
    }
}
