<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoardRequest;
use App\Models\Board;
use App\Services\BoardService;
use Illuminate\Support\Facades\Gate;

class BoardController extends Controller
{
    protected $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoardRequest $request)
    {
        $validated = $request->validated();
        $board = $this->boardService->create($validated);

        return $board;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        Gate::authorize('view', $board);

        return $board;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBoardRequest $request, Board $board)
    {
        $validated = $request->validated();
        $board = $this->boardService->update($board, $validated);

        return $board;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        Gate::authorize('delete', $board);

        $this->boardService->delete($board);

        return response()->json([
            'message' => 'success'
        ]);
    }
}