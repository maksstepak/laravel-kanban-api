<?php

namespace App\Services;

use App\Models\Board;
use App\Models\Column;

class ColumnService
{
    public function create(array $data, Board $board): Column
    {
        $column = Column::create([
            'name' => $data['name'],
            'board_id' => $board->id
        ]);

        return $column;
    }

    public function update(array $data, Column $column): void
    {
        $column->fill([
            'name' => $data['name']
        ]);

        $column->save();
    }

    public function delete(Column $column): void
    {
        $column->delete();
    }
}
