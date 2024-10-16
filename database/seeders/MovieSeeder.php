<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Deadpool & Wolverine',
            'slug' => Str::slug('deadpool-&-wolverine') . '-' . fake()->unique()->numberBetween(1000, 9999), // Generate the slug with a random number
            'age_rate' => 17,
            'duration' => '02:08:00', 
            'release_date' => '2024-07-24', 
            'poster' => 'img/deadpool&wolverine.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);

        Movie::create([
            'title' => 'Despicable Me 4',
            'slug' => Str::slug('despicable-me-4') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'duration' => '01:34:00', 
            'release_date' => '2024-07-03', 
            'poster' => 'img/despicableme4.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);
    }
}
