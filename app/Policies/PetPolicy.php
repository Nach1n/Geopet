<?php

namespace App\Policies;

use App\User;
use App\Pet;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function view(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }

    /**
     * Determine whether the user can create pets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id === $pet->user_id;
    }

    /**
     * Determine whether the user can update the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function update(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }

    /**
     * Determine whether the user can delete the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function delete(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }
}
