<?php

namespace App\Http\Controllers\Api\V1\PollSuggestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePollSuggestionRequest;
use App\Http\Requests\UpdatePollSuggestionRequest;
use App\Models\PollSuggestion;

class PollSuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollSuggestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PollSuggestion $pollSuggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollSuggestionRequest $request, PollSuggestion $pollSuggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollSuggestion $pollSuggestion)
    {
        //
    }
}
