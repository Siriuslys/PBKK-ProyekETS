<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', // Allow mass assignment for message
        'rating',  // Allow mass assignment for rating
        'movie_id', // Allow mass assignment for movie_id
        'user_id',  // Allow mass assignment for user_id
    ];
    
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
