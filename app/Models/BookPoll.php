<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPoll extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_club_id',
        'user_id',
        'start_date_poll',
        'end_date_poll',
        'final_read_date',
        'book_id',
        'book',
    ];

    public function bookClubId()
    {
        return $this->belongsTo(BookClub::class, 'book_club_id');
    }

    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
