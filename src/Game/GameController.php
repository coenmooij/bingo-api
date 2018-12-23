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

    public function getAll(Request $request)
    {
        $data = $this->gameService->getAll();

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
