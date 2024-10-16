<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Movie_GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil semua movie dan genre
        $movies = Movie::all();
        $genres = Genre::all(); // Mengambil semua genre

        // Menghubungkan movie dan genre secara acak
        foreach ($movies as $movie) {
            // Menghubungkan dengan 1 hingga 3 genre secara acak
            $randomGenres = $genres->random(rand(1, 3));
            foreach ($randomGenres as $genre) {
                $movie->genres()->attach($genre->id);
            }
        }
    }
}
