<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Column extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'board_id',
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
