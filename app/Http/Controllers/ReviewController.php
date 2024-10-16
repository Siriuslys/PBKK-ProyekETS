<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; // Import your Movie model
use App\Models\Review; // Import your Review model

class ReviewController extends Controller
{
    public function store(Request $request, Movie $movie) // Use type hinting for Movie model
    {
        // Validate the incoming request
        $request->validate([
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new review
      

        Review::create([
            'message' => $request->message, // Corrected to match your form field
            'rating' => $request->rating,
            'movie_id' => $movie->id, // Use the passed Movie model instance
            'user_id' => auth()->id(), // Corrected to call the method
        ]);

        return redirect()->route('movie.show', ['movie' => $movie->slug]) // Redirect using movie slug
            ->with('success', 'Review submitted successfully!');
    }
}
