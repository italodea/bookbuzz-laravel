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

    /**
     * Determine whether the user can join the book club.
     */
    public function join(User $user, BookClub $bookClub)
    {
        if ($user->id === $bookClub->owner_id) {
            return false;
        }
        return !$bookClub->participants()->where('user_id', $user->id)->exists();
    }

    /**
     * Determine whether the user can leave the book club.
     */
    public function leave(User $user, BookClub $bookClub)
    {
        if ($user->id === $bookClub->owner_id) {
            return false;
        }
        return $bookClub->participants()->where('user_id', $user->id)->exists();
    }
}
