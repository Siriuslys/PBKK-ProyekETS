<?

namespace App\Http\Controllers;

use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch movies with their reviews to calculate average ratings
        $movies = Movie::with('reviews')->get();

        return view('dashboard', [
            'movies' => $movies,
        ]);
    }
}
