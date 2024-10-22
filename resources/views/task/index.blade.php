<x-app-layout>
    <div class="py-12">
        <div>
            <x-slot name="header">
                <div class="flex justify-between w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tasks') }}
                </h2>
                <div class="mt-4">
                    <a href="{{ route('tasks.create') }}" class="text-indigo-600 hover:text-indigo-900 border border-gray-200 rounded p-2 bg-gray-100 hover:bg-gray-200">Create Task</a>
                </div>
            </x-slot>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($tasks as $task)
                <div class="p-6 mb-4 bg-white shadow sm:rounded-lg border border-gray-200 flex justify-between items-center">
                    <!-- Task Information -->
                    <a href="{{ route('tasks.show', $task) }}">
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

                    </a>
                    <!-- Task Actions -->
                    {{-- <div class="">
                        <a href="{{ route('tasks.attach', $task) }}" class="text-indigo-600 hover:text-indigo-900 border border-gray-200 rounded p-2 bg-gray-100 hover:bg-gray-200">Attach File</a>
                    </div>   --}}
                </div>
               
            @empty
                <p class="text-center text-gray-500">No tasks found</p>
            @endforelse
            <div class="mt-4">
                {{ $tasks->links() }}
                </div>
        </div>
        
    </div>
</x-app-layout>
