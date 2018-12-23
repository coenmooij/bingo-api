<?php

$router->get(
    '/',
    function () use ($router) {
        return 'Bingo';
    }
);

$router->get('games', 'Game\GameController@getAll');