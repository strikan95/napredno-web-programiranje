<x-modal name="remove-collaborator-modal-{{ $collaborator->id }}" focusable>
    <form method="post" action="{{ route('project.collaborator.destroy', [ $project, $collaborator->id ]) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Remove a collaborator.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Youre removing a collaborator here.') }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Remove') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
