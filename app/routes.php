<?php

$router->get(
    '/',
    function () use ($router) {
        return 'Bingo';
    }
);

$router->post('games', 'Game\GameController@post');
$router->delete('games/{id}', 'Game\GameController@delete');

$router->post('players', 'Player\PlayerController@post');
