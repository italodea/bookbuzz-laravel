<?php

namespace App\Policies;

use App\Models\BookClub;
use App\Models\BookPoll;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPoolPolicy
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
    public function view(User $user, BookPoll $bookPool): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(BookClub $bookClub, User $user): bool
    {
        return $bookClub->owner_id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BookPoll $bookPool): bool
    {
        // return $bookPool->book_club_id->owner_id != $user->id;
        return false;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BookPoll $bookPool): bool
    {
        return true;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BookPoll $bookPool): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BookPoll $bookPool): bool
    {
        return true;

    }
}
