<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    
    public function index()
    {
        $movies = Movie::orderBy('title')->get();
        $total = Movie::count();
        return view('admin.movie.home', compact(['movies', 'total']));
    }

    public function create()
    {
        $directors = Director::all();
        $actors = Actor::all();
        $genres = Genre::all();
        return view('admin.movie.create', compact(['directors', 'actors', 'genres']));
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'age_rate' => 'required|integer',
            'duration' => 'required',
            'release_date' => 'required|date',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'package' => 'required|boolean',
            'director_ids' => 'required|array',
            'director_ids.*' => 'required|exists:directors,id',
            'actor_ids' => 'required|array',
            'actor_ids.*' => 'required|exists:actors,id',
            'genre_ids' => 'required|array',
            'genre_ids.*' => 'required|exists:genres,id',
        ]);

        $filePath = public_path('img');

        // Handle file upload for poster
        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $file_name = $poster->getClientOriginalName();
            $poster->move($filePath, $file_name);
            $posterPath = 'img/' . $file_name;
        }

        $data = Movie::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'age_rate' => $request->age_rate,
            'duration' => $request->duration,
            'release_date' => $request->release_date,
            'poster' => $posterPath ?? null,
            'package' => $request->package,
        ]);

        // Insert into moviedirector
        $data->directors()->attach($request->director_ids);

        // Insert into movieactor
        $data->actors()->attach($request->actor_ids);
        
        $data->genres()->attach($request->genre_ids);
        
        if ($data) {
            session()->flash('success', 'Movie Add Successfully');
            return redirect(route('admin/movies'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.movies/create'));
        }
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movie.update', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'age_rate' => 'required|integer',
            'duration' => 'required',
            'release_date' => 'required|date',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'package' => 'required|boolean'
        ]);

        // Handle file upload for poster
        $filePath = public_path('img');
        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $file_name = $poster->getClientOriginalName();
            $poster->move($filePath, $file_name);
            $posterPath = 'img/' . $file_name;
            $movie->poster = $posterPath;
        }
        
        $title = $request->title;
        $age_rate = $request->age_rate;
        $duration = $request->duration;
        $release_date = $request->release_date;
        $package = $request->package;

        $movie->title = $title;
        $movie->slug = Str::slug($title);
        $movie->age_rate = $age_rate;
        $movie->duration = $duration;
        $movie->release_date = $release_date;
        $movie->package = $package;
        $data = $movie->save();
        if ($data) {
            session()->flash('success', 'Movie Update Successfully');
            return redirect(route('admin/movies'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.movies/update'));
        }
    }

    public function delete($id)
    {
        $movie = Movie::findOrFail($id)->delete();

        if ($movie) {
            session()->flash('success', 'Movie Deleted Successfully');
            return redirect(route('admin/movies'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.movies'));
        }
    }
}
