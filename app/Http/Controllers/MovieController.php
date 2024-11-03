<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MovieController extends Controller
{
    /**
     * Returns a list of movies
     */
    public function index(Request $request): JsonResponse
    {
        $movies = Movie::all();

        return response()->json([
            'data' => $movies
        ]);
    }
    

    /**
     * Stores a movie in the database
     */
    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->poster = $request->poster;
        $movie->save();
    }

    /**
     * Returns a single movie
     */
    public function show(Movie $movie): JsonResponse
    {
        return response()->json([
            'data' => $movie
        ]);      
    }

    /**
     * Updates a movie
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->all());
        return response()->json([
            'message' => 'Film mis à jour',
            'data' => $movie
        ]); 

    }

    /**
     * Deletes a movie
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response()->json([
            'message' => 'Film supprimé'
        ]);
    }
}
