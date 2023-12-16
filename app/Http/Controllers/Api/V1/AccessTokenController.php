<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessTokenController extends Controller
{
    /**
     * Store a new personal access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_name' => 'required',
        ]);

        $user = $request->user();

        $token = $user->createToken($request->device_name);

        return response(['token' => $token->plainTextToken]);
    }
}
