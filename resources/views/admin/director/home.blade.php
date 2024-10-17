<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Director') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-700">List Director</h1>
                    <div class="flex space-x-8">
                        <x-link-button route="admin/directors/create">
                            Add Director
                        </x-link-button>
                        <x-link-button route="admin/dashboard">
                            Go To Dashboard
                        </x-link-button>
                    </div>
                </div>

                @if(Session::has('success'))
                    <div class="px-4 py-3 rounded-lg shadow-md my-4" style="background-color: #d4edda; border-color: #c3e6cb; color: #155724;">
                        <span class="block sm:inline">{{ Session::get('success') }}</span>
                    </div>
                    <br>
                @endif
                

                <table class="w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">#</th>
                            <th class="py-2 px-4 border-b text-left">Director</th>
                            <th class="py-2 px-4 border-b text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($directors as $index => $director)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border-b">{{ $director->name }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('admin/directors/edit', ['id'=>$director->id]) }}" class="inline-flex items-center rounded-md px-3 py-1 transition duration-150 ease-in-out" style="background-color: #c9daf1; color: #0d6efd;">
                                        Edit
                                    </a>
                                    
                                    <a href="{{ route('admin/directors/delete', ['id'=>$director->id]) }}" class="inline-flex items-center rounded-md px-3 py-1 transition duration-150 ease-in-out" style="background-color: #f8d7da; color: #721c24;">
                                        Delete
                                    </a>
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-2 px-4 border-b text-center">No directors found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
