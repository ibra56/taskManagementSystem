<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            CREATE TASK
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
            <x-input-label for="title">Title</x-input-label>
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="category">Category</x-input-label>
            <select id="category" name="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-1">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="priority">Priority</x-input-label>
            <select id="priority" name="priorities_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-1">
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->priority }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('priorities_id')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="deadline">Deadline</x-input-label>
            <input id="deadline" name="deadline" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-1" type="datetime-local" />
            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="description">Description</x-input-label>
            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-1" rows="5"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    Create
                </x-primary-button>
            </div>
        </form>

    </div>
    </div>
    </div>
    </div>
</x-app-layout>