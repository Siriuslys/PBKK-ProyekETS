<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- search --}}
            <div class="mb-5">
            <form class="max-w-md mx-auto">   
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search your movie here..." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            </div>

            {{ $movies->links() }}

            @if($movies->isEmpty())
                <p class="text-center text-lg">No movies available based on your subscription or age restrictions.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @foreach ($movies as $movie)
                        <div class="max-w-48 bg-white border border-gray-200 rounded-lg shadow p-2">
                            <a href="{{ route('movie.show', $movie->slug) }}">
                                <img class="rounded-t-lg w-48 h-70 object-contain" src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" />
                            </a>
                            <div class="p-2">
                                <a href="{{ route('movie.show', $movie->slug) }}">
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">{{ $movie->title }}</h5>
                                    <p class="italic font-semibold">
                                        @if ($movie->reviews->isNotEmpty())
                                            {{ number_format($movie->reviews()->average('rating'), 1) }}/5
                                        @else
                                            No ratings yet.
                                        @endif
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
       
    </div>
</x-app-layout>
