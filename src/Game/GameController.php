<?php

namespace App\Game;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class GameController extends Controller
{
    private $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function post(Request $request): JsonResponse
    {
        $title = $request->get('title');
        if (!is_string($title) || $title === '') {
            return new JsonResponse(['message' => 'Missing parameter title'], Response::HTTP_BAD_REQUEST);
        }
        $game = $this->gameService->create($title);

        return new JsonResponse(['data' => $game], Response::HTTP_CREATED);
    }

    public function delete(Request $request, string $id): JsonResponse
    {
        $sessionId = $request->get('session_id');
        if (!is_string($sessionId) || $sessionId === '') {
            return new JsonResponse(['message' => 'Missing GET parameter sessionId'], Response::HTTP_BAD_REQUEST);
        }
        $this->gameService->deleteGame($id, $sessionId);

        return new JsonResponse(['message' => 'Game was deleted']);
    }
}
