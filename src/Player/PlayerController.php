<?php

namespace App\Player;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class PlayerController extends Controller
{
    private $playerService;

    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
    }

    public function post(Request $request): JsonResponse
    {
        $name = $request->get('name');
        if (!is_string($name) || $name === '') {
            return new JsonResponse(['message' => 'Missing parameter name'], Response::HTTP_BAD_REQUEST);
        }

        $pin = $request->get('pin');
        if (!is_string($pin) || $pin === '') {
            return new JsonResponse(['message' => 'Missing parameter pin'], Response::HTTP_BAD_REQUEST);
        }

        [$game, $player] = $this->playerService->joinGame($pin, $name);
        return new JsonResponse(['data' => ['game' => $game, 'card' => $player]], Response::HTTP_CREATED);
    }
}
