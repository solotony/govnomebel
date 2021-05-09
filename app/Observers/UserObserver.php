<?php

namespace App\Observers;

use App\User;
use Backpack\PermissionManager\app\Models\Role;

class UserObserver
{
    public function created(User $user)
    {
        $role = Role::findOrFail(5); // "Client"
        $user->assignRole($role->name);
    }
}
