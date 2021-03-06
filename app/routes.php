<?php

$router->get(
    '/',
    function () use ($router) {
        return 'Bingo';
    }
);

$router->post('games', 'Game\GameController@post');
$router->delete('games/{id}', 'Game\GameController@delete');
$router->get('games/{id}/players', 'Player\PlayerController@get');
$router->post('players', 'Player\PlayerController@post');
