<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\BoardService;
use Illuminate\Auth\Access\AuthorizationException;

class UserController extends Controller
{
    protected $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    public function boards(User $user)
    {
        try {
            $boards = $this->boardService->getAllBoardsForUser($user);
        } catch (AuthorizationException $e) {
            abort(403);
        }

        return $boards;
    }
}
