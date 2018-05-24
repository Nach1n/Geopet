<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability, User $editUser)
    {
        if($user->isAdmin() && !$editUser->isAdmin())
        {
            return true;
        }
    }

    public function account(User $user, User $model)
    {
        return $user->id === $model->id;
    }
    
    public function edit(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->id === $model->id;
    }

}
