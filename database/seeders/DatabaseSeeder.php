<?php

namespace Database\Seeders;

use App\Models\Director_Movie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            MovieSeeder::class,
            DirectorSeeder::class,
            ActorSeeder::class,
            ReviewSeeder::class,
            User_MovieSeeder::class,
            Movie_ArtisSeeder::class,
            Movie_GenresSeeder::class,
            Director_MoviesSeeder::class,
            

        ]);
        
    }
}
