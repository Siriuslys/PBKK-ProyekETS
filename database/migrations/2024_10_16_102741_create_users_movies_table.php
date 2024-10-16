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
        Schema::create('users_movies', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // Menggunakan unsignedBigInteger untuk mencocokkan dengan users
            $table->unsignedBigInteger('movie_id'); // Menggunakan unsignedBigInteger untuk mencocokkan dengan movies
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Menambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

            // Membuat kombinasi unik untuk user_id dan movie_id
            $table->primary(['user_id', 'movie_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users__movies');
    }
};
