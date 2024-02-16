<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookClubUser extends Model
{
    use HasFactory;
    protected $table = 'book_club_user';
    protected $fillable = ['book_club_id', 'user_id'];
}