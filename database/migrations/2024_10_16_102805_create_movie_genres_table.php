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
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->unsignedBigInteger('movie_id'); // Foreign key untuk movies
            $table->unsignedBigInteger('genre_id'); // Foreign key untuk actors
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Menambahkan foreign key constraint
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');

            // Membuat kombinasi unik untuk movie_id dan actor_id
            $table->primary(['genre_id', 'movie_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_genres');
    }
};
