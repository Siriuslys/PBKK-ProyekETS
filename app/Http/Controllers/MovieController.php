<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function show(Movie $movie)
    {
        // Calculate the average rating from the movie's reviews
        $averageRating = $movie->reviews()->average('rating');

        // Pass the movie and average rating to the view
        return view('movie.show', [
            'movie' => $movie,
            'averageRating' => $averageRating,
        ]);
    }
}
