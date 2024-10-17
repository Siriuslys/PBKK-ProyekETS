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

    public function update(Request $request, $reviewId)
    {
        // Validate the request data
        $request->validate([
            'message' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Find the review and update it
        $review = Review::findOrFail($reviewId);
        $review->message = $request->input('message');
        $review->rating = $request->input('rating');
        $review->save();

        // Get the associated movie from the review
        $movie = $review->movie;

        // Redirect back to the movie show page
        return redirect()->route('movie.show', ['movie' => $movie->slug])->with('success', 'Review updated successfully.');
    }

    public function delete($reviewId)
    {
        // Find the review
        $review = Review::findOrFail($reviewId);

        // Ensure the authenticated user is the owner of the review
        if (auth()->id() !== $review->user_id) {
            return redirect()->route('movies.show', ['movie' => $review->movie->slug])
                            ->with('error', 'You are not authorized to delete this review.');
        }

        // Get the movie before deleting the review for redirection
        $movie = $review->movie;

        // Delete the review
        $review->delete();

        // Redirect back to the movie show page with a success message
        return redirect()->route('movie.show', ['movie' => $movie->slug])
                        ->with('success', 'Review deleted successfully.');
    }




}
