<x-modal name="add-task-modal" focusable>
    <form method="post" action="/project/{{ $project->id }}/task" class="p-6">
        @csrf
        @method('post')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add a task.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Youre adding a task to the project here.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="text" value="{{ __('Task Description') }}" class="sr-only" />

            <x-text-input
                id="description"
                name="description"
                type="text"
                class="mt-1 block w-3/4"
                placeholder="{{ __('Write task description here...') }}"
            />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Save Task') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
