<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\BoardService;
use Throwable;

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
            $boards = $this->boardService->getAllUserBoards($user);
        } catch (Throwable $e) {
            abort(403);
        }

        return $boards;
    }
}
