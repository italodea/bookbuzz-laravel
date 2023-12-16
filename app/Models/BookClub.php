<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookClub extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo_url',
        'description',
        'owner_id',
        'is_private',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
