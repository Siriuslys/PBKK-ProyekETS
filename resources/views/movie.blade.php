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



{{-- 
 <x-app-layout>
    <div class="max-w-7xl mx-auto py-12">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-3xl font-bold">{{ $movie->title }}</h2>

            @if($movie->trailer)
                <div class=" w-full h-full">
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

            <img class="my-4 h-80 object-contain" src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}">

            <p class="mt-2"><strong>Release Date:</strong> {{ $movie->release_date }}</p>
            <p class="mt-2"><strong>Duration:</strong> {{ $movie->duration }}</p>
            <p class="mt-2"><strong>Age Rating:</strong>
                @switch($movie->age_rate)
                    @case(0)
                        General audiences
                        @break
                    @case(13)
                        PG-13.
                        @break
                    @case(17)
                        Restricted.
                        @break
                    @case(21)
                        Explicit.
                        @break
                    @default
                        Not Rated
                @endswitch
            </p>
                   
            {{-- Assuming $movie_genres is an array or collection of genres --}}
            {{-- <p class="mt-2"><strong>Genres:</strong> 
                @if($movie_genres->isNotEmpty())
                {{ implode(', ', $movie->genres->pluck('name')->toArray()) }}
                @else
                    No genres available.
                @endif
            </p>


            <p class="mt-2"><strong>Actor:</strong> 
                @if($movie_artis->isNotEmpty())
                {{ implode(', ', $movie->actors->pluck('name')->toArray()) }}
                @else
                    No actor available.
                @endif
            </p>

            <p class="mt-2"><strong>Director:</strong> 
                @if($director_movies->isNotEmpty())
                {{ implode(', ', $movie->directors->pluck('name')->toArray()) }}
                @else
                    No actor available.
                @endif
            </p>


            {{-- Display the trailer if available --}}
{{--             
        </div>
    </div>
</x-app-layout> --}} 
