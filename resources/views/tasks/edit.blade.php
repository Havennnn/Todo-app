<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create a Task
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 space-y-2">
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $task->title ) }}" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ old('description', $task->description) }}" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="completed" :value="__('Status')" />
                    <select id="completed" name="completed" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="0" {{ old('completed', $task->completed) == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ old('completed', $task->completed) == 1 ? 'selected' : '' }}>Complete</option>
                    </select>
                    <x-input-error :messages="$errors->get('complete')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="text-center">
                        {{ __('Update Task') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
