<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookPollResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'book_club_id' => $this->book_club_id,
            'user_id' => $this->user_id,
            'start_date_poll' => $this->start_date_poll,
            'end_date_poll' => $this->end_date_poll,
            'final_read_date' => $this->final_read_date,
            'book_id' => $this->book_id,
            'book' => $this->book,
        ];
    }

    public static function collection($resource)
    {
        return $resource;
    }


    public static function make(... $resource)
    {
        return $resource;
    }

}