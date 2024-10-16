<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Movie; // Import the Movie model
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $movies = Movie::all(); 
    return view('dashboard', compact('movies')); 
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/movie/{movie:slug}', function (Movie $movie) {
    $movie->load('genres', 'actors', 'directors');
    return view('movie', [
        'movie' => $movie,
        'movie_genres' => $movie->genres,
        'movie_artis' => $movie->actors,
        'director_movies'=>$movie->directors 
    ]);
})->middleware(['auth', 'verified'])->name('movie.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

