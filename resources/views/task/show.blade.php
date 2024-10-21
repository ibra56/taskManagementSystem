<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ $task->title }} Task Details
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Task Card -->
            <div class="p-6 bg-white shadow sm:rounded-lg border border-gray-200">
                <!-- Task Title -->
                <div class="flex justify-between items-center">
                    {{-- <h3 class="text-2xl font-bold text-gray-800">{{ $task->title }}</h3> --}}

                    <!-- Delete Button -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                            Delete
                        </button>
                    </div>
                    </form>
                </div>

                <!-- Task Details -->
                <div class="mt-4">
                    <p class="text-gray-600">{{ $task->description }}</p>
                    
                    <div class="mt-4 space-y-2">
                        <!-- Status -->
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Status:</span>
                            <span class="ml-2 inline-block px-3 py-1 text-xs font-semibold rounded
                                {{ $task->status === 'pending' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </div>

                        <!-- Category -->
                        <div class="">
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Category Name:</span>
                            <span class="ml-2 text-gray-600">{{ $task->category->name }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Category Description:</span>
                            <span class="ml-2 text-gray-600">{{ $task->category->description }}</span>
                        </div>

                        <!-- Priority -->
                        <div >
                
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Priority Name:</span>
                            <span class="ml-2 text-gray-600">{{ $task->priorities->priority }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Priority Level:</span>
                            <span class="ml-2 text-gray-600">{{ $task->priorities->level }}</span>
                        </div>
                        </div>

                        <!-- Deadline -->
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Deadline:</span>
                            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y H:i') }}</span>
                        </div>

                        <!-- Created At -->
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Created At:</span>
                            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y H:i') }}</span>
                        </div>

                        <!-- Updated At -->
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-800">Updated At:</span>
                            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($task->updated_at)->format('M d, Y H:i') }}</span>
                        </div>

                        <!-- User -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
