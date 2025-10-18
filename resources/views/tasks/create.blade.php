<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create a Task
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 space-y-2">
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="text-center">
                        {{ __('Create Task') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
