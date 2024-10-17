<?

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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

        public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Movie::where('name', 'like', "%$search%")->get();

        return view('products.index', ['results' => $results]);
    }

    
}
