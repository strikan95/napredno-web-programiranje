<section class="pt-4 pr-4 pl-4 pb-1 shadow-md rounded-md mr-4 bg-white">
    <div class="flex pb-1 border-b-2">
        <h1 class="text-xl font-bold">
            Collaborators
        </h1>

        <a href="{{ route('project.candidates.index', $project) }}" class="ml-auto">
            <svg class="h-8 hover:stroke-blue-700 cursor-pointer"
                 aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>

    </div>
    <div class="w-11/12 mx-auto relative">
        <div class="mt-6">
        @if(count($project->collaborators) > 0)
            @foreach($project->collaborators as $collaborator)
                    <div class="transform transition cursor-pointer hover:-translate-y-1 relative px-2 py-1 text-white-600 rounded mb-2 md:space-y-0 flex">
                        <!-- Content that showing in the box -->
                        <div class="flex-row">
                            <a href="{{route('user.show', $collaborator)}}">
                                <div class="hover:text-blue-700">
                                    {{ $collaborator->name }}
                                    ID: {{ $collaborator->id }}
                                </div>
                            </a>
                        </div>

                        <div class="ml-auto flex space-x-8">
                            <button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'remove-collaborator-modal-{{ $collaborator->id }}')"
                            >
                                <svg
                                    class="h-6 hover:stroke-blue-700 cursor-pointer"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                </svg>
                            </button>
                        </div>
                    </div>
            @endforeach
        @else
            <div class="transform transition cursor-pointer hover:-translate-y-1 relative flex items-center px-2 py-1 bg-red-200 text-white-600 rounded mb-6 flex-col md:flex-row space-y-4 md:space-y-0">
                <!-- Content that showing in the box -->
                <div class="flex-auto">
                    <h1 class="text-md font-bold">
                        No Collaborators.
                    </h1>
                </div>
            </div>
        @endif
        </div>
    </div>

    {{--Modals for editing--}}
    @if(count($project->collaborators) > 0)
        @foreach($project->collaborators as $collaborator)
            @include('project.partials.collaborators.remove')
        @endforeach
    @endif
</section>
