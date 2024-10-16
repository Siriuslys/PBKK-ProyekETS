<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movies>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1000, 9999),            
            'age_rate' => $this->faker->randomElement([0, 13, 17, 21]),  
            'duration' => $this->formatDuration($this->faker->numberBetween(0, 180)),  
            'release_date' => $this->faker->date(),  
            'poster' => $this->faker->imageUrl(640, 480, 'movies', true),  
            'package' => $this->faker->boolean(),  
            'created_at' => now(),  
            'updated_at' => now(),  
        ];
    }

    private function formatDuration(int $minutes): string
    {
        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;
        return sprintf('%02d:%02d:00', $hours, $remainingMinutes);
    }
}
