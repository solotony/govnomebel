<?php

namespace App\Observers;

use Backpack\CRUD\Tests\Unit\Models\User;
use Backpack\PermissionManager\app\Models\Role;

class UserObservers
{
    public function created(User $user)
    {
        $role = Role::findOrFail(5); // Client
        dd($role);
    }
}
