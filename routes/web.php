<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $movies = Movie::all(); 
    return view('dashboard', compact('movies')); 
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/movie/{movie:slug}', function (Movie $movie) {
    $movie->load('genres', 'actors', 'directors','reviews');

    $averageRating = $movie->reviews()->average('rating');

    return view('movie', [
        'movie' => $movie,
        'movie_genres' => $movie->genres,
        'movie_artis' => $movie->actors,
        'director_movies'=>$movie->directors,
        'reviews' => $movie->reviews, 
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

