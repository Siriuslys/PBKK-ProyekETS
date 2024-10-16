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
        Schema::create('movie_artis', function (Blueprint $table) {
            $table->unsignedBigInteger('movie_id'); // Foreign key untuk movies
            $table->unsignedBigInteger('actor_id'); // Foreign key untuk actors
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Menambahkan foreign key constraint
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');

            // Membuat kombinasi unik untuk movie_id dan actor_id
            $table->primary(['movie_id', 'actor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_artis');
    }
};
