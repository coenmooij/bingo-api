<?php

namespace App\Game;

class GameService
{

    public function getAll(): array
    {
        return [
            ['title' => 'My game', 'description' => 'Playing bingo with frenz'],
            ['title' => 'More geemz', 'description' => 'MORE BINGOOOOO'],
        ];
    }
}