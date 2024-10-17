<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{   
    public function index(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user
        $userAge = Carbon::parse($user->birth_date)->age;

        // Fetch movies where the package is less than or equal to the user's package and age_rate <= user's age
        $movies = Movie::where('package', '<=', $user->package)
                       ->where('age_rate', '<=', $userAge);

        // Fetch all genres, actors, and directors
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();

        // Filter berdasarkan genres jika genres dipilih
        $movies->when($request->genres, function ($query, $selectedGenres) {
            $query->whereHas('genres', function ($subQuery) use ($selectedGenres) {
                $subQuery->whereIn('id', $selectedGenres);
            });
        });

        // Filter berdasarkan actors jika actors dipilih
        $movies->when($request->actors, function ($query, $selectedActors) {
            $query->whereHas('actors', function ($subQuery) use ($selectedActors) {
                $subQuery->whereIn('id', $selectedActors);
            });
        });

        // Filter berdasarkan directors jika directors dipilih
        $movies->when($request->directors, function ($query, $selectedDirectors) {
            $query->whereHas('directors', function ($subQuery) use ($selectedDirectors) {
                $subQuery->whereIn('id', $selectedDirectors);
            });
        });

        // Filter pencarian berdasarkan judul, genres, atau nama lainnya
        $movies->when($request->search, function ($query, $search) {
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('title', 'like', '%' . $search . '%')
                         ->orWhereHas('genres', function ($subSubQuery) use ($search) {
                             $subSubQuery->where('name', 'like', '%' . $search . '%');
                         })
                         ->orWhereHas('actors', function ($subSubQuery) use ($search) {
                             $subSubQuery->where('name', 'like', '%' . $search . '%');
                         })
                         ->orWhereHas('directors', function ($subSubQuery) use ($search) {
                             $subSubQuery->where('name', 'like', '%' . $search . '%');
                         });
            });
        });

        // Fetch the movies with pagination
        $movies = $movies->latest()->simplePaginate(10);

        return view('dashboard', compact('movies', 'genres', 'actors', 'directors'));
    }
}
