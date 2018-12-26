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

    public function get(Request $request, string $id): JsonResponse
    {
        $sessionId = $request->get('session_id');
        if (!is_string($sessionId) || $sessionId === '') {
            return new JsonResponse(['message' => 'Missing GET parameter sessionId'], Response::HTTP_BAD_REQUEST);
        }
        $players = $this->playerService->get($id, $sessionId);

        return new JsonResponse(['data' => $players]);
    }

    public function post(Request $request): JsonResponse
    {
        $name = $request->get('name');
        if (!is_string($name) || $name === '') {
            return new JsonResponse(['message' => 'Missing parameter name'], Response::HTTP_BAD_REQUEST);
        }

        $pin = $request->get('pin');
        if (empty($pin)) {
            return new JsonResponse(['message' => 'Missing parameter pin'], Response::HTTP_BAD_REQUEST);
        }

        [$game, $player] = $this->playerService->joinGame($pin, $name);

        return new JsonResponse(['data' => ['game' => $game, 'card' => $player]], Response::HTTP_CREATED);
    }
}
