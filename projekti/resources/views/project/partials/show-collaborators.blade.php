<section class="pt-4 pr-4 pl-4 pb-1 shadow-md rounded-md mr-4 bg-white">
    <div class="flex pb-1 border-b-2">
        <h1 class="text-xl font-bold">
            Collaborators
        </h1>

        <svg class="h-8 ml-auto hover:stroke-blue-700 cursor-pointer"
             aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
    <ol class="divide-y">
        @if(count($project->collaborators) > 0)
            @foreach($project->collaborators as $collaborator)
                <li class="mb-3 pt-4">
                    <a href="{{route('project.show', $project)}}">
                        <div class="hover:text-blue-700">
                            {{ $collaborator->name }}
                        </div>
                    </a>
                </li>
            @endforeach
        @else
            <li class="mb-3 pt-4">
                <div class="hover:text-blue-700">
                    No collaborators.
                </div>
            </li>
        @endif
    </ol>
</section>
