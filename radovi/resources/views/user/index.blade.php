<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if($project !== null)
                    {{ __('Add A Collaborator') }}
                @else
                    {{ __('User Index') }}
                @endif
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @foreach($users as $user)
                        <div class="transform transition cursor-pointer hover:-translate-y-1 relative px-2 py-1 text-white-600 rounded mb-2 md:space-y-0 flex">
                            <!-- Content that showing in the box -->
                            <div class="flex-row">
                                <a href="{{route('user.show', $user)}}">
                                    <div class="hover:text-blue-700">
                                        {{ $user->name }}
                                    </div>
                                </a>
                            </div>

                            <div class="ml-auto flex space-x-8">
                                <button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'add-collaborator-modal-{{ $user->id }}')"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{--Modals for editing--}}
    @if(count($users) > 0)
        @foreach($users as $user)
            @include('project.partials.collaborators.add')
        @endforeach
    @endif

</x-app-layout>
