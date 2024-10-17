<?php

use Carbon\Carbon;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user(); // Get the authenticated user
    $userAge = Carbon::parse($user->birth_date)->age;

    // Fetch movies where the package is less than or equal to the user's package and age_rate <= user's age
    $movies = Movie::where('package', '<=', $user->package)
                   ->where('age_rate', '<=', $userAge)
                   ->filter(request('search')) // Apply filter for search input
                   ->latest()
                   ->simplePaginate(5);

    return view('dashboard', compact('movies')); 
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/movie/{movie:slug}', function (Movie $movie) {
    $movie->load('genres', 'actors', 'directors','reviews');

    $averageRating = $movie->reviews()->average('rating');

    $reviews = $movie->reviews()->simplePaginate(5);

    return view('movie', [
        'movie' => $movie,
        'movie_genres' => $movie->genres,
        'movie_artis' => $movie->actors,
        'director_movies'=>$movie->directors,
        'reviews' => $reviews, 
        'averageRating' => $averageRating,
    ]);
})->middleware(['auth', 'verified'])->name('movie.show');

Route::post('/reviews/store/{movie}', [ReviewController::class, 'store'])->middleware(['auth'])->name('reviews.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

