<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Movie_ArtisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil semua movie dan actor
        $movies = Movie::all();
        $actors = Actor::all();

        // Menghubungkan movie dan actor secara acak
        foreach ($movies as $movie) {
            // Menghubungkan dengan 1 hingga 3 actor secara acak
            $randomActors = $actors->random(rand(1, 4));
            foreach ($randomActors as $actor) {
                $movie->actors()->attach($actor->id);
            }
        }
    }
}
