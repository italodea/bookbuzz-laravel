<?php

namespace App\Policies;

use App\Models\BookClub;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookClubPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BookClub $bookClub): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAuthenticated();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BookClub $bookClub): bool
    {
        return $user->id === $bookClub->owner_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BookClub $bookClub): bool
    {
        return $user->id === $bookClub->owner_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BookClub $bookClub): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BookClub $bookClub): bool
    {
        return $user->id === $bookClub->owner_id;
    }
}
