<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <label for="name">Name</label>  
                            <input type="text" name="name" id="name" class="border border-gray-300 p-2 rounded" value="{{ old('name') }}">
                        </div>
                        <div class="flex flex-col">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="border border-gray-300 p-2 rounded" value="{{ old('description') }}">
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>