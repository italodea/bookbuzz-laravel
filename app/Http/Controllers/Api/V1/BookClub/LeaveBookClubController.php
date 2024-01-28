<?php

namespace App\Http\Controllers\Api\V1\BookClub;

use App\Http\Controllers\Controller;
use App\Models\BookClub;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveBookClubController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,BookClub $bookClub)
    {
        try {
            $this->checkAuthorization('leave', $bookClub);
            
            $user = Auth::id();
            $bookClub->participants()->detach($user);

            $bookClub->save();

            return response()->json([
                'message' => 'You have leaved this book club.'
            ], 200);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }
}
