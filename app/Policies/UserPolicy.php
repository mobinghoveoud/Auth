<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function approve(User $user)
    {
        return $user->isApprove();
    }

    public function admin( User $user )
    {
        return $user->isAdmin();
    }
}
