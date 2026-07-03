<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnimalPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user)
    {
        return $user->isAdmin === 1
        ? Response::allow()
        : Response::denyAsNotFound();
    }
}
