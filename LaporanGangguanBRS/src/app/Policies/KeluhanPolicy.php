<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Keluhan;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeluhanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Keluhan');
    }

    public function view(AuthUser $authUser, Keluhan $keluhan): bool
    {
        return $authUser->can('View:Keluhan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Keluhan');
    }

    public function update(AuthUser $authUser, Keluhan $keluhan): bool
    {
        return $authUser->can('Update:Keluhan');
    }

    public function delete(AuthUser $authUser, Keluhan $keluhan): bool
    {
        return $authUser->can('Delete:Keluhan');
    }

}