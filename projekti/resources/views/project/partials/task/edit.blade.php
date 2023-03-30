<x-modal name="edit-task-modal-{{ $task->id }}" focusable>
    <form method="post" action="/project/{{ $project->id }}/task/{{ $task->id }}" class="p-6">
        @csrf
        @method('put')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit a task.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Youre editing a task to the project here.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="text" value="{{ __('Task Description') }}" class="sr-only" />

            <x-text-input
                id="description"
                name="description"
                type="text"
                class="mt-1 block w-3/4"
                value="{{ __($task->description) }}"
            />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Save Changes') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
