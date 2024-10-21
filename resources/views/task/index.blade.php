<x-app-layout>
    <div class="py-12">
        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tasks') }}
                </h2>
            </x-slot>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($tasks as $task)
                <div class="p-6 mb-4 bg-white shadow sm:rounded-lg border border-gray-200 flex justify-between items-center">
                    <!-- Task Information -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $task->title }}</h3>
                        <p class="text-gray-600">{{ $task->description }}</p>

                        <div class="flex space-x-4 mt-2">
                            <span class="inline-block px-2 py-1 text-xs font-semibold 
                                {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $task->status === 'in-progress' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $task->status === 'pending' ? 'bg-red-100 text-red-800' : '' }}
                                rounded">{{ ucfirst($task->status) }}</span>

                            <span class="text-sm text-gray-500">Created: {{ $task->created_at->format('M d, Y') }}</span>
                            <span class="text-sm text-gray-500">Deadline: {{ $task->deadline }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">No tasks found</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
