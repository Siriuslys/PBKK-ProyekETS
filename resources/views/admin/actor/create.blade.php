<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Actor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-700">Add Actor</h1>
                    <x-link-button route="admin/actors">
                        Go Back
                    </x-link-button>
                    
                </div>

                @if(Session::has('error'))
                    <div class="px-4 py-3 rounded-lg shadow-md my-4" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24;">
                        <span class="block sm:inline">{{ Session::get('error') }}</span>
                    </div>
                @endif

                <form action="{{ route('admin/actors/save') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Actor')" />
                        <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
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
