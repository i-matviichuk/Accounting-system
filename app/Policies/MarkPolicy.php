<?php

namespace App\Policies;

use App\Marks;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarkPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function delete(User $user, Marks $marks)
    {
        if ($user->hasRole('admin') || $user->hasRole('teacher')) {
            return true;
        }
        return false;
    }
}
