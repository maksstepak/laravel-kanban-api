<?php

namespace App\Services;

use App\Models\Card;
use App\Models\Column;

class CardService
{
    public function create(array $data, Column $column): Card
    {
        $card = Card::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'due_date' => $data['due_date'],
            'column_id' => $column->id
        ]);

        return $card;
    }

    public function update(array $data, Card $card): void
    {
        $card->fill([
            'name' => $data['name'],
            'description' => $data['description'],
            'due_date' => $data['due_date']
        ]);

        $card->save();
    }

    public function delete(Card $card): void
    {
        $card->delete();
    }
}
