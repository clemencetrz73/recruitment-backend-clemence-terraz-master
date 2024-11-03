<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReviewController extends Controller
{
    /**
     * Returns a list of reviews for a movie
     */
    public function index(Request $request, Movie $movie): JsonResponse
    {
        $reviews = $movie->reviews;

        return response()->json([
        'data' => $reviews
        ]); 
    }

    /**
     * Stores a movie review in the database
     */
    public function store(Request $request, Movie $movie)
    {
        $review = new Review;
        $review->author = $request->author;
        $review->body = $request->body;
        $review->save();
        $movie->reviews()->save($review);

        return response()->json([
        'message' => 'Avis ajouté',
        'data' => $review
        ]); 
    }

    /**
     * Returns a single review
     */
    public function show(Review $review): JsonResponse
    {
        return response()->json([
            'data' => $review
        ]); 
    }

    /**
     * Updates a review
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->all());
        return response()->json([
            'message' => 'Avis mis à jour',
            'data' => $movie
        ]); 
    }

    /**
     * Deletes a review
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return response()->json([
            'message' => 'Avis supprimé'
        ]);
        }
}
