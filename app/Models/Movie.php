<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MoviesFactory> */
    use HasFactory;

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_artis'); // Specify the pivot table if different from the default
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres'); // Specify the pivot table name if necessary
    }

    public function directors()
{
    return $this->belongsToMany(Director::class, 'director_movies');
}

        public function reviews()
        {
            return $this->hasMany(Review::class); // Adjust as necessary if the foreign key is different
        }

}
