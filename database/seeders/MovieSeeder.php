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
            'age_rate' => 21,
            'duration' => '02:08:00',
            'trailer' => 'https://youtu.be/73_1biulkYk?si=VDSd1RJDtEBmEo6O', 
            'release_date' => '2024-07-24', 
            'poster' => 'img/deadpool&wolverine.jpg', 
            'package' => 1, 
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
            'package' => 0, 
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
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Joker',
            'slug' => Str::slug('joker') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 21,
            'duration' => '02:02:00', 
            'trailer'=> 'https://youtu.be/zAGVQLHvwOY?si=JTztjpy_gqa3GV1Q',
            'release_date' => '2019-10-02', 
            'poster' => 'img/joker.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);


        Movie::create([
            'title' => 'Spirited Away',
            'slug' => Str::slug('spirited-away') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/ByXuk9QqQkk?si=qKW4QNuoL-00xg6I',
            'duration' => '02:05:00', 
            'release_date' => '2001-07-20', 
            'poster' => 'img/spiritedaway.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Flow',
            'slug' => Str::slug('flow') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/82WW9dVbglI?si=cL1id5qSdpIm7PIy',
            'duration' => '01:24:00', 
            'release_date' => '2024-09-21', 
            'poster' => 'img/flow.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Spider-Man',
            'slug' => Str::slug('spider-man') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 17,
            'trailer'=> 'https://youtu.be/t06RUxPbp_c?si=3fTRoPlggO8ntBih',
            'duration' => '02:01:00', 
            'release_date' => '2002-05-22', 
            'poster' => 'img/spiderman.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Spider-Man: No Way Home',
            'slug' => Str::slug('spider-man-no-way-home') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 17,
            'trailer'=> 'https://youtu.be/JfVOs4VSpmA?si=Hc6Y8ipqyF9Moayd',
            'duration' => '02:28:00', 
            'release_date' => '2021-12-15', 
            'poster' => 'img/spidernowayhome.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'A Quiet Place: Day One',
            'slug' => Str::slug('a-quiet-place-day-one') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 17,
            'trailer'=> 'https://youtu.be/YPY7J-flzE8?si=qJX77J4rnC1gDOlH',
            'duration' => '01:39:00', 
            'release_date' => '2021-12-15', 
            'poster' => 'img/aquietplace.jpg', 
            'package' => fake()->boolean(), 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Monsters',
            'slug' => Str::slug('monsters') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 21,
            'trailer'=> 'https://youtu.be/O1-ELdJiX0k',
            'duration' => '02:10:00', 
            'release_date' => '2024-09-19', 
            'poster' => 'img/monsters.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'slug' => Str::slug('the-dark-knight') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/kmJLuwP3MbY',
            'duration' => '02:32:00', 
            'release_date' => '2008-07-18', 
            'poster' => 'img/thedarkknight.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Parasite',
            'slug' => Str::slug('parasite') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 17,
            'trailer'=> 'https://youtu.be/SEUXfv87Wpk',
            'duration' => '02:13:00', 
            'release_date' => '2019-06-24', 
            'poster' => 'img/parasite.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Pulp Fiction',
            'slug' => Str::slug('pulp fiction') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 17,
            'trailer'=> 'https://youtu.be/tGpTpVyI_OQ?si=7gD1V0PLxi1hkaIi',
            'duration' => '02:34:00', 
            'release_date' => '1994-10-14', 
            'poster' => 'img/pulpfiction.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Your Name',
            'slug' => Str::slug('your-name') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/xU47nhruN-Q',
            'duration' => '01:46:00', 
            'release_date' => '2016-08-26', 
            'poster' => 'img/yourname.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'The Lord of the Rings: The Return of the King',
            'slug' => Str::slug('the lord of the rings the return of the king') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/zckJCxYxn1g',
            'duration' => '03:21:00', 
            'release_date' => '2004-01-14', 
            'poster' => 'img/lotrtrk.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Forest Gump',
            'slug' => Str::slug('forest-gump') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/bLvqoHBptjg',
            'duration' => '02:22:00', 
            'release_date' => '2016-01-07', 
            'poster' => 'img/forestgump.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Graven of the Fireflies',
            'slug' => Str::slug('graven-of-the-fireflies') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/lhlh7JVcTt8?si=RHdd5_54AbJm-svm',
            'duration' => '01:29:00', 
            'release_date' => '1988-04-16', 
            'poster' => 'img/graveofthefireflies.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Interstellar',
            'slug' => Str::slug('interstellar') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/zSWdZVtXT7E?si=6s7v3OUy9TiRqvgI',
            'duration' => '02:49:00', 
            'release_date' => '2014-11-06', 
            'poster' => 'img/interstellar.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Fight Club',
            'slug' => Str::slug('fight-club') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 21,
            'trailer'=> 'https://youtu.be/BdJKm16Co6M?si=rmaxu_j0cZnewNLo',
            'duration' => '02:19:00', 
            'release_date' => '2021-11-05', 
            'poster' => 'img/fightclub.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Inception',
            'slug' => Str::slug('inception') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13 ,
            'trailer'=> 'https://youtu.be/YoHD9XEInc0?si=TfPsg03bfb9oWcAm',
            'duration' => '02:28:00', 
            'release_date' => '2010-07-06', 
            'poster' => 'img/inception.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Dead Poets Society',
            'slug' => Str::slug('dead-poets-society') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 17,
            'trailer'=> 'https://youtu.be/rLCJaTDdWtw',
            'duration' => '02:08:00', 
            'release_date' => '2020-09-05', 
            'poster' => 'img/deadpoetsociety.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Five Feet Apart',
            'slug' => Str::slug('five-feet-apart') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/5cJ7MT1RTqs?si=tTY8y8ifLNSUvLhl',
            'duration' => '01:56:00', 
            'release_date' => '2019-03-15', 
            'poster' => 'img/fivefeetapart.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Avengers: Endgame',
            'slug' => Str::slug('avengers endgame') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/5cJ7MT1RTqs?si=tTY8y8ifLNSUvLhl',
            'duration' => '03:01:00', 
            'release_date' => '2019-04-24', 
            'poster' => 'img/avengersendgame.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Coco',
            'slug' => Str::slug('coco') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 0,
            'trailer'=> 'https://youtu.be/xlnPHQ3TLX8',
            'duration' => '01:45:00', 
            'release_date' => '2017-11-22', 
            'poster' => 'img/coco.jpg', 
            'package' => 0, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);

        Movie::create([
            'title' => 'Harry Potter and the Prisoner of Azkaban',
            'slug' => Str::slug('harry potter and the prisoner of azkaban') . '-' . fake()->unique()->numberBetween(1000, 9999), 
            'age_rate' => 13,
            'trailer'=> 'https://youtu.be/R69laoH02xg',
            'duration' => '02:21:00', 
            'release_date' => '2004-06-16', 
            'poster' => 'img/hp.jpg', 
            'package' => 1, 
            'created_at' => now(), 
            'updated_at' => now(),  
        ]);














    }
}
