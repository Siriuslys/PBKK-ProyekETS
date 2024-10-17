<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-link-button route="admin/genres">
                Genre
            </x-link-button>
            <x-link-button route="admin/actors">
                Actor
            </x-link-button>
            <x-link-button route="admin/directors">
                Director
            </x-link-button>
            <x-link-button route="admin/movies">
                Movie
            </x-link-button>
        </div>
    </div>
</x-app-layout>
