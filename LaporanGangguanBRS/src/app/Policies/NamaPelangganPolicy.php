<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\NamaPelanggan;
use Illuminate\Auth\Access\HandlesAuthorization;

class NamaPelangganPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:NamaPelanggan');
    }

    public function view(AuthUser $authUser, NamaPelanggan $namaPelanggan): bool
    {
        return $authUser->can('View:NamaPelanggan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:NamaPelanggan');
    }

    public function update(AuthUser $authUser, NamaPelanggan $namaPelanggan): bool
    {
        return $authUser->can('Update:NamaPelanggan');
    }

    public function delete(AuthUser $authUser, NamaPelanggan $namaPelanggan): bool
    {
        return $authUser->can('Delete:NamaPelanggan');
    }

}