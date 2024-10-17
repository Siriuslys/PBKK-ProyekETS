<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-700">Edit Movie</h1>
                    <x-link-button route="admin/movies">
                        Go Back
                    </x-link-button>
                </div>

                @if(Session::has('error'))
                    <div class="px-4 py-3 rounded-lg shadow-md my-4" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24;">
                        <span class="block sm:inline">{{ Session::get('error') }}</span>
                    </div>
                @endif

                <form action="{{ route('admin/movies/update', ['id' => $movie->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="title" :value="old('title', $movie->title)" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="age_rate" :value="__('Age Rate')" />
                        <x-text-input id="age_rate" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="number" name="age_rate" :value="old('age_rate', $movie->age_rate)" required />
                        <x-input-error :messages="$errors->get('age_rate')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="duration" :value="__('Duration (HH:MM:SS)')" />
                        <x-text-input id="duration" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="time" name="duration" :value="old('duration', $movie->duration)" required />
                        <x-input-error :messages="$errors->get('duration')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="release_date" :value="__('Release Date')" />
                        <x-text-input id="release_date" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="date" name="release_date" :value="old('release_date', $movie->release_date)" required />
                        <x-input-error :messages="$errors->get('release_date')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="poster" :value="__('Poster')" />
                        <x-text-input id="poster" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="file" name="poster" />
                        <x-input-error :messages="$errors->get('poster')" class="mt-2 text-red-600" />
                        <p class="text-gray-500 mt-2">Leave blank if you don't want to change the poster.</p>
                    </div>

                    <div>
                        <x-input-label for="package" :value="__('Package')" />
                        <select id="package" name="package" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="1" {{ old('package', $movie->package) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('package', $movie->package) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        <x-input-error :messages="$errors->get('package')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-primary-button>
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
