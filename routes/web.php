<?php

use Carbon\Carbon;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DirectorController;


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

    $userReview = $movie->reviews()->where('user_id', auth()->id())->first();

    $reviews = $movie->reviews()->simplePaginate(5);

    return view('movie', [
        'movie' => $movie,
        'movie_genres' => $movie->genres,
        'movie_artis' => $movie->actors,
        'director_movies'=>$movie->directors,
        'reviews' => $reviews, 
        'averageRating' => $averageRating,
        'userReview' => $userReview,
    ]);
})->middleware(['auth', 'verified'])->name('movie.show');

Route::post('/reviews/store/{movie}', [ReviewController::class, 'store'])->middleware(['auth'])->name('reviews.store');
Route::put('/reviews/update/{movie}', [ReviewController::class, 'update'])->middleware(['auth'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'delete'])->name('reviews.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/plan', [ProfileController::class, 'plan'])->name('profile.plan');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin/dashboard');

    Route::get('admin/genres', [GenreController::class, 'index'])->name('admin/genres');
    Route::get('admin/genres/create', [GenreController::class, 'create'])->name('admin/genres/create');
    Route::post('admin/genres/save', [GenreController::class, 'save'])->name('admin/genres/save');
    Route::get('admin/genres/edit/{id}', [GenreController::class, 'edit'])->name('admin/genres/edit');
    Route::put('admin/genres/update/{id}', [GenreController::class, 'update'])->name('admin/genres/update');
    Route::get('admin/genres/delete/{id}', [GenreController::class, 'delete'])->name('admin/genres/delete');

    Route::get('admin/actors', [ActorController::class, 'index'])->name('admin/actors');
    Route::get('admin/actors/create', [ActorController::class, 'create'])->name('admin/actors/create');
    Route::post('admin/actors/save', [ActorController::class, 'save'])->name('admin/actors/save');
    Route::get('admin/actors/edit/{id}', [ActorController::class, 'edit'])->name('admin/actors/edit');
    Route::put('admin/actors/update/{id}', [ActorController::class, 'update'])->name('admin/actors/update');
    Route::get('admin/actors/delete/{id}', [ActorController::class, 'delete'])->name('admin/actors/delete');

    Route::get('admin/directors', [DirectorController::class, 'index'])->name('admin/directors');
    Route::get('admin/directors/create', [DirectorController::class, 'create'])->name('admin/directors/create');
    Route::post('admin/directors/save', [DirectorController::class, 'save'])->name('admin/directors/save');
    Route::get('admin/directors/edit/{id}', [DirectorController::class, 'edit'])->name('admin/directors/edit');
    Route::put('admin/directors/update/{id}', [DirectorController::class, 'update'])->name('admin/directors/update');
    Route::get('admin/directors/delete/{id}', [DirectorController::class, 'delete'])->name('admin/directors/delete');

    Route::get('admin/movies', [MovieController::class, 'index'])->name('admin/movies');
    Route::get('admin/movies/create', [MovieController::class, 'create'])->name('admin/movies/create');
    Route::post('admin/movies/save', [MovieController::class, 'save'])->name('admin/movies/save');
    Route::get('admin/movies/edit/{id}', [MovieController::class, 'edit'])->name('admin/movies/edit');
    Route::put('admin/movies/update/{id}', [MovieController::class, 'update'])->name('admin/movies/update');
    Route::get('admin/movies/delete/{id}', [MovieController::class, 'delete'])->name('admin/movies/delete');
});

require __DIR__.'/auth.php';

