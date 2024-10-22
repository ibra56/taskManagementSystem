<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4 border-b pb-4">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="window.history.back()">Back</button>
                            @can('delete', $category)
                            <form action="{{ route('category.delete', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                            @endcan 
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h3>
                        <p class="text-gray-600">{{ $category->description }}</p>
                    </div>
                   
                </div>
                
            </div>
            <div class="flex flex-col bg-gray-200 mt-4 rounded p-4">
                <h3 class="text-xl font-bold text-gray-800 mb-4 uppercase">Edit Category</h3>

                <form action="{{ route('category.update', $category) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="border border-gray-300 p-2 rounded" value="{{ $category->name }}">
                    </div>
                    <div class="flex flex-col">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="border border-gray-300 p-2 rounded" value="{{ $category->description }}">
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>