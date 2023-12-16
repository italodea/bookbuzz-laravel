<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'token' => $this->token,
            'user' => [
                "id" => $this->id,
                "name" => $this->name,
                "email" => $this->email,
            ],
        ];
    }
}
