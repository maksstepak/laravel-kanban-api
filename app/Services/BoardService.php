<?php

namespace App\Services;

use App\Models\Board;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class BoardService
{
    public function create(array $data): Board
    {
        $board = Board::create([
            'name' => $data['name'],
            'user_id' => Auth::id(),
        ]);

        return $board;
    }

    public function update(Board $board, array $data): void
    {
        $board->fill([
            'name' => $data['name'],
        ]);

        $board->save();
    }

    public function delete(Board $board): void
    {
        $board->delete();
    }

    public function getAllBoardsForUser(User $user): Collection
    {
        if (Auth::id() !== $user->id) {
            throw new AuthorizationException();
        }

        return $user->boards;
    }
}
