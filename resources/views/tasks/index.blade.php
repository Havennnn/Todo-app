<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Task Page
            </h2>
            <x-primary-button href="{{ route('tasks.create') }}" type="link">
                Create Task
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($tasks as $task)
            <div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mb-6 flex justify-between items-center">
                    {{-- Left: clickable area to view the task --}}
                    <a href="{{ route('tasks.show', $task->id) }}" class="p-6 text-gray-900 dark:text-gray-100 flex-1">
                        <h1 class="font-bold text-xl">{{ $task->title }}
                                @if($task->completed == true)
                                    <span class="text-sm text-green-500 font-normal">(Completed)</span>
                                @else
                                    <span class="text-sm text-red-500 font-normal">(Pending)</span>
                                @endif
                        </h1>
                        <p class="italic">{{ $task->description }}</p>
                        <p>{{ $task->status }}</p>
                    </a>

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <x-secondary-button type="submit">
                                Delete
                            </x-secondary-button>
                        </form>

                        <x-secondary-button href="{{ route('tasks.edit', $task->id) }}" type="link">
                            Edit
                        </x-secondary-button>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-8">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
