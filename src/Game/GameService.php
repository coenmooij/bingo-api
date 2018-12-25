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
        $game->balls = $this->generateBalls();
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

    public function generateBalls(): string
    {
        $balls = range(1, 75);
        shuffle($balls);

        return json_encode($balls);
    }
}
