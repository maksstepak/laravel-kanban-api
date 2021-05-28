<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColumnRequest;
use App\Models\Column;
use App\Services\ColumnService;
use Illuminate\Support\Facades\Gate;

class ColumnController extends Controller
{
    protected $columnService;

    public function __construct(ColumnService $columnService)
    {
        $this->columnService = $columnService;
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

        return $column;
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
        $column = $this->columnService->update($validated, $column);

        return $column;
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
}
