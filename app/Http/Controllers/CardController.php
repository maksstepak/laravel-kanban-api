<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Services\CardService;
use Illuminate\Support\Facades\Gate;

class CardController extends Controller
{
    protected $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        Gate::authorize('view', $card);

        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCardRequest $request, Card $card)
    {
        Gate::authorize('update', $card);

        $validated = $request->validated();
        $this->cardService->update($validated, $card);

        return new CardResource($card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        Gate::authorize('delete', $card);

        $this->cardService->delete($card);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
