<x-app-layout>
    <div class="max-w-7xl mx-auto py-12">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-3xl font-bold">{{ $movie->title }}</h2>

            <div class="flex flex-col md:flex-row mt-4"> {{-- Flex container for video and details --}}
                <div class="flex-1"> {{-- Video container --}}
                    @if($movie->trailer)
                        <div class="w-full h-full">
                            @php
                                // Extract the video ID from the YouTube URL
                                if (strpos($movie->trailer, 'youtube.com') !== false) {
                                    parse_str(parse_url($movie->trailer, PHP_URL_QUERY), $videoParams);
                                    $videoId = $videoParams['v'] ?? null; // Get the video ID (after ?v=)
                                } elseif (strpos($movie->trailer, 'youtu.be') !== false) {
                                    $videoId = substr(parse_url($movie->trailer, PHP_URL_PATH), 1); // For youtu.be links
                                } else {
                                    $videoId = null; // Invalid YouTube link
                                }
                            @endphp

                            @if($videoId)
                                <iframe class="w-full h-96 mt-4" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                            @else
                                <p class="text-red-500">Invalid trailer URL.</p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="flex-1 ml-0 md:ml-6 mt-4 md:mt-0"> {{-- Movie details container --}}
                    <img class="h-80 object-contain" src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}">

                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Rating: 
                            @if($averageRating)
                                {{ number_format($averageRating, 1) }}/5
                            @else
                                No ratings yet.
                            @endif
                        </h3>
                    </div>
                    <p class="mt-2"><strong>Release Date:</strong> {{ $movie->release_date }}</p>
                    <p class="mt-2"><strong>Duration:</strong> {{ $movie->duration }}</p>
                    <p class="mt-2"><strong>Age Rating:</strong>
                        @switch($movie->age_rate)
                            @case(0)
                                General audiences
                                @break
                            @case(13)
                                PG-13
                                @break
                            @case(17)
                                Restricted
                                @break
                            @case(21)
                                Explicit
                                @break
                            @default
                                Not Rated
                        @endswitch
                    </p>

                    <p class="mt-2"><strong>Genres:</strong> 
                        @if($movie_genres->isNotEmpty())
                            {{ implode(', ', $movie->genres->pluck('name')->toArray()) }}
                        @else
                            No genres available.
                        @endif
                    </p>

                    <p class="mt-2"><strong>Actors:</strong> 
                        @if($movie_artis->isNotEmpty())
                            {{ implode(', ', $movie->actors->pluck('name')->toArray()) }}
                        @else
                            No actors available.
                        @endif
                    </p>

                    <p class="mt-2"><strong>Directors:</strong> 
                        @if($director_movies->isNotEmpty())
                            {{ implode(', ', $movie->directors->pluck('name')->toArray()) }}
                        @else
                            No directors available.
                        @endif
                    </p>
                </div>
            </div>

            {{-- Reviews Section --}}
<div class="mt-8">

    {{-- Review submission form --}}
    <h4 class="text-xl mt-6 font-bold">Add a Review</h4>
    <form action="{{ route('reviews.store', $movie->id) }}" method="POST" class="mt-4">
        @csrf
        <div>
            <textarea name="message" rows="4" class="w-full p-2 border border-gray-300 rounded" placeholder="Write your review..." required></textarea>
        </div>
        <div class="mt-2">
            <label for="rating" class="block mb-1">Rating:</label>
            <select name="rating" class="w-full p-2 border border-gray-300 rounded" required>
                <option value="">Select a rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Submit Review</button>
    </form>

    {{-- Display existing reviews --}}
    {{-- Display existing reviews --}}
    <div class="mt-4">
        <h3 class="text-2xl font-bold">Reviews</h3>
        @if($reviews->isNotEmpty())
            @foreach($reviews as $review)
                <div class="border-b pb-2 mt-2">
                    <strong>{{ $review->user->name }}</strong>
                    <div class="flex items-center mt-1"> {{-- Flex container for stars and rating --}}
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-6 h-6 {{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-400' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                            </svg>
                        @endfor
                        <span class="ml-2 text-gray-600">{{ $review->rating }}/5</span>
                    </div>
                    <p>{{ $review->message }}</p>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $reviews->links() }} {{-- This will render pagination controls --}}
            </div>
        @else
            <p>No reviews available.</p>
        @endif
    </div>

</div>


                
            </div>
        </div>
    </div>
</x-app-layout>


{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto py-12">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-3xl font-bold">{{ $movie->title }}</h2>

            <div class="flex flex-col md:flex-row mt-4"> 
                <div class="flex-1">
                    @if($movie->trailer)
                        <div class="w-full h-full">
                            @php
                                // Extract the video ID from the YouTube URL
                                if (strpos($movie->trailer, 'youtube.com') !== false) {
                                    parse_str(parse_url($movie->trailer, PHP_URL_QUERY), $videoParams);
                                    $videoId = $videoParams['v'] ?? null; // Get the video ID (after ?v=)
                                } elseif (strpos($movie->trailer, 'youtu.be') !== false) {
                                    $videoId = substr(parse_url($movie->trailer, PHP_URL_PATH), 1); // For youtu.be links
                                } else {
                                    $videoId = null; // Invalid YouTube link
                                }
                            @endphp

                            @if($videoId)
                                <iframe class="w-full h-96 mt-4" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                            @else
                                <p class="text-red-500">Invalid trailer URL.</p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="flex-1 ml-0 md:ml-6 mt-4 md:mt-0"> 
                    <img class="h-80 object-contain" src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}">

                    <p class="mt-2"><strong>Release Date:</strong> {{ $movie->release_date }}</p>
                    <p class="mt-2"><strong>Duration:</strong> {{ $movie->duration }}</p>
                    <p class="mt-2"><strong>Age Rating:</strong>
                        @switch($movie->age_rate)
                            @case(0)
                                General audiences
                                @break
                            @case(13)
                                PG-13
                                @break
                            @case(17)
                                Restricted
                                @break
                            @case(21)
                                Explicit
                                @break
                            @default
                                Not Rated
                        @endswitch
                    </p>

                    <p class="mt-2"><strong>Genres:</strong> 
                        @if($movie_genres->isNotEmpty())
                            {{ implode(', ', $movie->genres->pluck('name')->toArray()) }}
                        @else
                            No genres available.
                        @endif
                    </p>

                    <p class="mt-2"><strong>Actors:</strong> 
                        @if($movie_artis->isNotEmpty())
                            {{ implode(', ', $movie->actors->pluck('name')->toArray()) }}
                        @else
                            No actors available.
                        @endif
                    </p>

                    <p class="mt-2"><strong>Directors:</strong> 
                        @if($director_movies->isNotEmpty())
                            {{ implode(', ', $movie->directors->pluck('name')->toArray()) }}
                        @else
                            No directors available.
                        @endif
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
 --}}

