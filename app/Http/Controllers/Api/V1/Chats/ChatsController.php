<?php

namespace App\Http\Controllers\Api\V1\Chats;

use App\Http\Requests\StoreChatsRequest;
use App\Http\Requests\UpdateChatsRequest;
use App\Models\Chats;
use App\Http\Controllers\Controller;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chats $chats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chats $chats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatsRequest $request, Chats $chats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chats $chats)
    {
        //
    }
}
