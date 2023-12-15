<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookClubRequest;
use App\Http\Requests\UpdateBookClubRequest;
use App\Http\Resources\BookClubResource;
use App\Models\BookClub;

class BookClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookClubResource::collection(BookClub::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookClubRequest $request)
    {
        $bookClub = BookClub::create($request->validated());

        return BookClubResource::make($bookClub);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookClub $bookClub)
    {
        return BookClubResource::make($bookClub);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookClubRequest $request, BookClub $bookClub)
    {
        $bookClub->update($request->validated());
        return BookClubResource::make($bookClub);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookClub $bookClub)
    {
        $bookClub->delete();

        return response()->noContent();
    }
}
