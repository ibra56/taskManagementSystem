<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>

            <a href="{{ route('category.create') }}" class="text-indigo-600 hover:text-indigo-900 border border-gray-200 rounded p-2 bg-gray-100 hover:bg-gray-200">Create Category</a>
        </div>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        @forelse ($categories as $category)
        <a href="{{ route('category.edit', $category) }}">
            <div class="p-6 mb-4 bg-white shadow sm:rounded-lg border border-gray-200 flex justify-between items-center">
                
                    <h3 class="text-xl font-bold text-gray-800">{{ $category->name }}</h3>
               
            </div>
        </a>
        
        @empty
            <p class="text-center text-gray-500">No categories found</p>
        @endforelse
        {{ $categories->links() }}
    </div>
    
    </div>
</x-app-layout>