<x-modal name="delete-task-modal-{{ $task->id }}" focusable>
    <form method="post" action="{{ route('project.task.destroy', [ $project, $task ]) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete a task.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Youre deleting a task here.') }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Delete') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
