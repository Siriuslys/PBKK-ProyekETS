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
        // Movie::factory()->count(50)->create();

        Movie::create([
            'title' => 'Deadpool & Wolverine',
            'slug' => Str::slug('deadpool-&-wolverine') . '-' . fake()->unique()->numberBetween(1000, 9999), // Generate the slug with a random number
            'age_rate' => 17,
            'duration' => '02:08:00',
            'trailer' => 'https://youtu.be/73_1biulkYk?si=VDSd1RJDtEBmEo6O', 
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
            'trailer'=> 'https://youtu.be/qQlr9-rF32A?si=mdRl357p3zkqQWWb' ,
            'release_date' => '2024-07-03', 
            'poster' => 'img/despicableme4.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Inside Out 2',
            'slug' => Str::slug('inside-out-2') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'duration' => '01:37:00', 
            'trailer'=> 'https://youtu.be/LEjhY15eCx0?si=dNIwTrvTpfL8lB4I',
            'release_date' => '2024-06-11', 
            'poster' => 'img/insideout2.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Joker',
            'slug' => Str::slug('joker') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'duration' => '02:02:00', 
            'trailer'=> 'https://youtu.be/zAGVQLHvwOY?si=JTztjpy_gqa3GV1Q',
            'release_date' => '2019-10-02', 
            'poster' => 'img/joker.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);


        Movie::create([
            'title' => 'Spirited Away',
            'slug' => Str::slug('spirited-away') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/zAGVQLHvwOY?si=JTztjpy_gqa3GV1Q',
            'duration' => '02:05:00', 
            'release_date' => '2024-06-11', 
            'poster' => 'img/spiritedaway.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Flow',
            'slug' => Str::slug('flow') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/zAGVQLHvwOY?si=JTztjpy_gqa3GV1Q',
            'duration' => '01:24:00', 
            'release_date' => '2024-09-21', 
            'poster' => 'img/flow.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Spider-Man',
            'slug' => Str::slug('spider-matt') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/zAGVQLHvwOY?si=JTztjpy_gqa3GV1Q',
            'duration' => '02:01:00', 
            'release_date' => '2002-05-22', 
            'poster' => 'img/spiderman.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Spider-Man: No Way Home',
            'slug' => Str::slug('flow') . 'spiderman-no-way-home' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/zAGVQLHvwOY?si=JTztjpy_gqa3GV1Q',
            'duration' => '02:28:00', 
            'release_date' => '2021-12-15', 
            'poster' => 'img/spider no way home.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'A Quiet Place: Day One',
            'slug' => Str::slug('flow') . 'a-quiet-place-day-one' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/zAGVQLHvwOY?si=JTztjpy_gqa3GV1Q',
            'duration' => '01:39:00', 
            'release_date' => '2021-12-15', 
            'poster' => 'img/aquiteplace no way home.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);












    }
}
