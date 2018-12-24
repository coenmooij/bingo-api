<?php

$router->get(
    '/',
    function () use ($router) {
        return 'Bingo';
    }
);

$router->post('games', 'Game\GameController@post');
