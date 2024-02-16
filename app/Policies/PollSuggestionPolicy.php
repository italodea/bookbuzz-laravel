<?php

namespace App\Policies;

use App\Models\BookClub;
use App\Models\BookClubUser;
use App\Models\BookPoll;
use App\Models\PollSuggestion;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PollSuggestionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PollSuggestion $pollSuggestion): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(BookPoll $bookPoll, User $user): bool
    {
        $pollSuggestion = PollSuggestion::wehere('poll_id', $bookPoll->id)->where('user_id', $user->id)->first();
        if ($pollSuggestion->count() > 0) {
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PollSuggestion $pollSuggestion): bool
    {
        return $pollSuggestion->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PollSuggestion $pollSuggestion): bool
    {
        return $pollSuggestion->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PollSuggestion $pollSuggestion): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PollSuggestion $pollSuggestion): bool
    {
        //
    }
}
