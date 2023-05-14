<?php

namespace App\Policies;

use App\Maison;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaisonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Maison $maison)
    {
        return $maison->user_id === $user->id;
    }

    public function delete(User $user, Maison $maison)
    {
        return $maison->user_id === $user->id;
    }
}
