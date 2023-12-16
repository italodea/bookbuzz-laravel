<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookClub\FindRequest;
use App\Http\Requests\BookClub\StoreRequest;
use App\Http\Requests\BookClub\UpdateRequest;
use App\Http\Resources\BookClubResource;
use App\Models\BookClub;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class BookClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FindRequest $request)
    {
        $query = BookClub::with('owner');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('owner')) {
            $query->whereHas('owner_id', function ($query) use ($request) {
                $query->where('id', $request->input('owner'));
            });
        }

        $bookClubs = $query->paginate($request->input('limit') ?? 10);

        return BookClubResource::collection($bookClubs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['owner_id'] = Auth::id();

        $bookClub = BookClub::create($validatedData);
        $bookClub->load('owner');
        return BookClubResource::make($bookClub);
    }
    /**
     * Display the specified resource.
     */
    public function show(BookClub $bookClub)
    {
        $bookClub->load('owner');

        return BookClubResource::make($bookClub);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, BookClub $bookClub)
    {
        try {
            $this->authorize('update', $bookClub);

            $bookClub->update($request->validated());
            $bookClub->load('owner');

            return BookClubResource::make($bookClub);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookClub $bookClub)
    {
        try {
            $this->authorize('delete', $bookClub);
            $bookClub->delete();
            return response()->noContent();
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }
}
