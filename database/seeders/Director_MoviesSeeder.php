<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Director;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Director_MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directors = Director::all();
        $movies = Movie::all();

        // Menghubungkan director dan movie secara acak
        foreach ($directors as $director) {
            // Menghubungkan dengan 1 hingga 3 movie secara acak
            $randomMovies = $movies->random(rand(1, 3));
            foreach ($randomMovies as $movie) {
                $director->movies()->attach($movie->id);
            }
        }
    }
}
