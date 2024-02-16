<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'page',
        'charpter',
        'google_book_id',
        'book_club_id',
        'user_id',
    ];
}
