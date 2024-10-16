<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('director_movies', function (Blueprint $table) {
            $table->unsignedBigInteger('movie_id'); // Foreign key untuk movies
            $table->unsignedBigInteger('director_id'); // Foreign key untuk directors
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Menambahkan foreign key constraint
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');

            // Membuat kombinasi unik untuk movie_id dan director_id
            $table->primary(['movie_id', 'director_id']); // Primary key combination
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director_movies');
    }
};

// <!-- <!-- <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('director_movies', function (Blueprint $table) {
//             $table->unsignedBigInteger('movie_id'); // Foreign key untuk movies
//             $table->unsignedBigInteger('director_id'); // Foreign key untuk actors
//             $table->timestamps(); // Timestamps untuk created_at dan updated_at

//             // Menambahkan foreign key constraint
//             $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
//             $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');

//             // Membuat kombinasi unik untuk movie_id dan actor_id
//             $table->primary(['director_id', 'movie_id']);
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('director_movies');
//     }
// };