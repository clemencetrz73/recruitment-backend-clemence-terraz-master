<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchMovies extends Command
{
    protected $signature = 'movies:fetch';

    protected $description = 'Fetches movies from an external API and inserts them in the database.';
    public function handle(): int
    {
        // Récupérer les données des films depuis l'API
        $list = Http::get('http://localhost:3000/api/movies')->collect();
            
        // Itérer sur chaque film pour les ajouter à la BDD
        //Erreur lors du test
        foreach ($list as $movie) {
            $newMovie = new Movie;
            $newMovie->title = $movie['title']; 
            $newMovie->year = $movie['year'];   
            $newMovie->poster = $movie['poster']; 
            $newMovie->save();
        }
    
        return 0;
    }
}
