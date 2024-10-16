


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($movies as $movie)
                    <div class="max-w-48 bg-white border border-gray-200 rounded-lg shadow p-2">
                        <a href="{{ route('movie.show', $movie->slug) }}">
                            <img class="rounded-t-lg w-48 h-70 object-contain" src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" />
                        </a>
                        <div class="p-2">
                            <a href="{{ route('movie.show', $movie->slug) }}">
                                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">{{ $movie->title }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

