<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\StoreColumnRequest;
use App\Http\Resources\ColumnResource;
use App\Models\Column;
use App\Services\CardService;
use App\Services\ColumnService;
use Illuminate\Support\Facades\Gate;

class ColumnController extends Controller
{
    protected $columnService;

    protected $cardService;

    public function __construct(ColumnService $columnService, CardService $cardService)
    {
        $this->columnService = $columnService;
        $this->cardService = $cardService;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function show(Column $column)
    {
        Gate::authorize('view', $column);

        return new ColumnResource($column);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function update(StoreColumnRequest $request, Column $column)
    {
        Gate::authorize('update', $column);

        $validated = $request->validated();
        $this->columnService->update($validated, $column);

        return (new ColumnResource($column))->response()->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function destroy(Column $column)
    {
        Gate::authorize('delete', $column);

        $this->columnService->delete($column);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function cards(Column $column)
    {
        Gate::authorize('view', $column);

        return $column->cards;
    }

    public function storeCard(StoreCardRequest $request, Column $column)
    {
        Gate::authorize('update', $column);

        $validated = $request->validated();
        $card = $this->cardService->create($validated, $column);

        return $card;
    }
}
