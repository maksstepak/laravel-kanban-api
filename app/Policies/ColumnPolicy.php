<?php

namespace App\Policies;

use App\Models\Column;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColumnPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Column  $column
     * @return mixed
     */
    public function view(User $user, Column $column)
    {
        return $user->id === $column->board->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Column  $column
     * @return mixed
     */
    public function update(User $user, Column $column)
    {
        return $user->id === $column->board->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Column  $column
     * @return mixed
     */
    public function delete(User $user, Column $column)
    {
        return $user->id === $column->board->user_id;
    }
}
