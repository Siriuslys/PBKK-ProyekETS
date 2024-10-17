<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class User_MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $movies = Movie::all();

        // Menghubungkan user dan movie secara acak
        foreach ($users as $user) {
            // Menghubungkan dengan 1 hingga 5 movie secara acak
            $randomMovies = $movies->random(rand(1, 15));
            foreach ($randomMovies as $movie) {
                $user->movies()->attach($movie->id);
            }
        }
    }
}
