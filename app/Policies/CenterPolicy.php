<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->hasRole('super-admin');
    }

    public function update(User $user): bool
    {
        return $user->hasRole('super-admin');
    }

    public function delete(User $user): bool
    {
        return $user->hasRole('super-admin');
    }
}
