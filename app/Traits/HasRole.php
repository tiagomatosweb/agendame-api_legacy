<?php

namespace App\Traits;

use App\Models\Role;

trait HasRole
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }

    public function getPermissions()
    {
        return $this->roles->flatMap(function($role) {
            return $role->permissions->pluck('name');
        })->unique();
    }
}
