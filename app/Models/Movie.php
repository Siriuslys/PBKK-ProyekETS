<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MoviesFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'age_rate',
        'duration',
        'password',
        'release_date',
        'poster',
        'package'
    ];

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
        return $this->hasMany(Review::class); 
    }

    public function scopeFilter(Builder $query)
    {
        $query->where('title', 'like', '%' . request('search') . '%');
    }
}
