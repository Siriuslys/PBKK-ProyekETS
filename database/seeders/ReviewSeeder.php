<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Inisialisasi Faker

        // Ambil semua movie dan user
        $movies = Movie::all();
        $users = User::all();

        // Menyisipkan 50 review acak
        foreach (range(1, 50) as $index) {
            Review::create([
                'user_id' => $users->random()->id, // Ambil user secara acak
                'movie_id' => $movies->random()->id, // Ambil movie secara acak
                'message' => $faker->text(200), // Ulasan acak
                'rating' => $faker->numberBetween(1, 5), // Rating acak antara 1 hingga 5
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
