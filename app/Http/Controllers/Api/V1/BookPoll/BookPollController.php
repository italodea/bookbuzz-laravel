<?php

namespace App\Http\Controllers\Api\V1\BookPoll;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookPoll\FindBookPollRequest as FindRequest;
use App\Http\Requests\BookPoll\StoreBookPollRequest as StoreRequest;
use App\Http\Requests\BookPoll\UpdateBookPollRequest as UpdateRequest;
use App\Http\Resources\BookPollResource;
use App\Models\BookClub;
use App\Models\BookPoll;
use Illuminate\Support\Facades\Auth;

class BookPollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookClub $bookClub, FindRequest $request)
    {
        $query = BookPoll::with('bookClubId', 'userId');

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        $polls = $query->where('book_club_id', $bookClub->id)->paginate($request->input('limit') ?? 10);
        return BookPollResource::collection($polls);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookClub $bookClub, StoreRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::id();
        $validatedData['book_club_id'] = $bookClub->id;

        $this->checkAuthorization($bookClub);

        $bookPollList = BookPoll::where('book_club_id', $bookClub->id)
            ->where('end_date_poll', '>=', now())
            ->get();
        if ($bookPollList->count() > 0) {
            return response()->json([
                'message' => 'There is already a poll in progress for this book club',
            ], 409);
        }

        $bookPoll = BookPoll::create($validatedData);

        return BookPollResource::make($bookPoll);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $bookClub, int $bookPollId)
    {
        $bookPoll = BookPoll::with('bookClubId', 'userId')->find($bookPollId);
        return BookPollResource::make($bookPoll);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCLub $bookClub, int $bookPollId, UpdateRequest $request)
    {
        $this->checkAuthorization($bookClub);

        $validatedData = $request->validated();
        $bookPoll = BookPoll::with('userId', 'bookClubId')->find($bookPollId);

        $bookPoll->update($validatedData);
        return BookPollResource::make($bookPoll);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookClub $bookClub, int $bookPoolId)
    {
        $this->checkAuthorization($bookClub);
        $bookPoll = BookPoll::find($bookPoolId);
        $bookPoll->delete();
        return response()->noContent();
    }


    private function checkAuthorization(BookClub $bookClub)
    {
        if ($bookClub->owner_id != Auth::id()) {
            return response()->json([
                'message' => 'Only an admin can manage a poll',
            ], 401);
        }
    }
}
