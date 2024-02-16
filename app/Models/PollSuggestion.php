<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollSuggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'book_id',
        'book',
        'user_id',
    ];

    public function pollId()
    {
        return $this->belongsTo(BookPoll::class, 'poll_id');
    }

    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
