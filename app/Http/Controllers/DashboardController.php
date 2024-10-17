<?

namespace App\Http\Controllers;

use App\Models\Movie;

class DashboardController extends Controller
{   
    public function index()
    {
        $movies = Movie::with('reviews')->get();

        return view('dashboard', [
            'movies' => $movies,
        ]);
    }
}
