<?php

namespace App\Http\Controllers\Api\V1\BookClub;

use App\Http\Controllers\Controller;
use App\Models\BookClub;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class JoinBookClubController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke( BookClub $bookClub)
    {
        try {
            // $this->checkAuthorization('join', $bookClub);
            
            $user = Auth::id();
            $bookClub->participants()->attach($user);

            $bookClub->save();

            return response()->json([
                'message' => 'You have joined this book club.'
            ], 200);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }
}
