<x-modal name="add-collaborator-modal-{{ $user->id }}" focusable>
    <form method="post" action="{{ route('project.collaborator.store', $project) }}" class="p-6">
        @csrf
        @method('post')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add a collaborator.') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Youre adding '). $user->name . __(' as collaborator to the project.') }}
        </p>

        <div class="mt-6">
            <x-text-input
                id="collaborator_id"
                name="collaborator_id"
                type="text"
                class="mt-1 hidden w-3/4"
                value="{{ $user->id }}"
            />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Add Collaborator') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
