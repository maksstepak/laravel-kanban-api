<?php

namespace App\Services;

use App\Models\Board;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class BoardService
{
    public function create(array $data)
    {
        $board = Board::create([
            'name' => $data['name'],
            'user_id' => Auth::id(),
        ]);

        return $board;
    }

    public function update(Board $board, array $data)
    {
        $board->fill([
            'name' => $data['name'],
        ]);

        return $board;
    }

    public function delete(Board $board)
    {
        $board->delete();
    }

    public function getAllUserBoards(User $user)
    {
        if (Auth::id() !== $user->id) {
            throw new AuthorizationException();
        }

        return $user->boards;
    }
}
