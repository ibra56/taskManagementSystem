<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ $task->title }} Task Details
        </h2>
        
    </x-slot>
    <div class="py-12  justify-between">
        <div class="full mx-auto sm:px-6 lg:px-8">
            <!-- Task Card -->
            <div class="p-6 bg-white shadow sm:rounded-lg border border-gray-200">
                <!-- Task Title -->
                <div class="flex justify-between items-center">
                    {{-- <h3 class="text-2xl font-bold text-gray-800">{{ $task->title }}</h3> --}}
                    <div></div>
                    <div class="flex items-center space-x-4">
                        @can('edit', $task)
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold uppercase border border-gray-200 rounded p-2 bg-gray-100" hover:bg-gray-200>
                            Edit
                        </a>
                        @endcan
                    <!-- Delete Button -->
                    @can('delete', $task)
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <div class="flex items-center space-x-1 border border-gray-200 rounded p-2 bg-gray-100 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold uppercase">
                            Delete
                        </button>
                        </div>
                    </form>
                    @endcan
                    </div>
                </div>

                <!-- Task Details -->
                <div class="mt-4 ">
                    <!-- Description -->
                    <div class="mt-4 border-t border-b border-gray-200 py-4 bg-gray-50">
                    <p class="text-gray-600 uppercase">Description:</p>
                    <p class="text-gray-600">{{ $task->description }}</p>
                    </div>
                    
                    <div class="mt-4 space-y-2 bg-gray-50 border-t border-b border-gray-200 py-4 space-y-4">
                        <!-- Status -->
                        <div class="flex items-center border border-gray-200 rounded justify-between p-2">
                            <span class="font-semibold text-gray-800">Status:</span>
                            <span class="ml-2 inline-block px-3 py-1 text-xs font-semibold uppercase rounded
                                {{ $task->status === 'pending' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </div>

                        <!-- Category -->
                        <div class="space-y-2">
                        <div class="flex items-center justify-between border border-gray-200 rounded p-2">
                            <span class="font-semibold text-gray-800 uppercase">Category Name:</span>
                            <span class="ml-2 text-gray-600 uppercase">{{ $task->category->name }}</span>
                        </div>
                        <div class="flex items-center justify-between border border-gray-200 rounded p-2">
                            <span class="font-semibold text-gray-800">Category Description:</span>
                            <span class="ml-2 text-gray-600">{{ $task->category->description }}</span>
                        </div>

                        <!-- Priority -->
                        <div class="space-y-2">
                
                        <div class="flex items-center justify-between border border-gray-200 rounded p-2">
                            <span class="font-semibold text-gray-800">Priority Name:</span>
                            <span class="ml-2 text-gray-600">{{ $task->priorities->priority }}</span>
                        </div>
                        <div class="flex items-center justify-between border border-gray-200 rounded p-2">
                            <span class="font-semibold text-gray-800">Priority Level:</span>
                            <span class="ml-2 text-gray-600">{{ $task->priorities->level }}</span>
                        </div>
                        </div>

                        <!-- Deadline -->
                       
                        <div class="flex items-center justify-between border border-gray-200 rounded p-2">
                            <span class="font-semibold text-gray-800">Deadline:</span>
                            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y H:i') }}</span>
                        </div>

                        <!-- Created At -->
                        <div class="flex items-center justify-between border border-gray-200 rounded p-2">
                            <span class="font-semibold text-gray-800">Created At:</span>
                            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y H:i') }}</span>
                        </div>

                        <!-- Updated At -->
                        <div class="flex items-center justify-between border border-gray-200 rounded p-2">
                            <span class="font-semibold text-gray-800">Updated At:</span>
                            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($task->updated_at)->format('M d, Y H:i') }}</span>
                        </div>

                        <!-- User -->
                        
                    </div>
                </div>
                 {{-- Attachments --}}
                 <div class="mt-4 border-t border-b border-gray-200 py-4 bg-gray-50">
                    <p class="text-gray-600 uppercase">Attachments:</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($task->attachments as $attachment)
                        <a href="{{ Storage::url($attachment->file_path) }}" target="_blank">
                            <div class="p-4 bg-white border border-gray-200 rounded">
                                <p class="text-gray-600">{{ $attachment->file_name }}</p>
                            </div>
                        </a>
                        @empty
                        <p class="text-gray-600">No attachments found</p>
                        @endforelse
                    </div>
                </div>
                
            </div>
        
            {{-- <div> --}}
               
            {{-- </div>   --}}
        </div>
       
    </div>
</x-app-layout>
