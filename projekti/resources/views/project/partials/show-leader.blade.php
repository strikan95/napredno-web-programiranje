<section class="mb-4 pt-4 pr-4 pl-4 pb-1 shadow-md rounded-md mr-4 bg-white">
    <h1 class="pb-1 text-xl font-bold border-b-2">
        Project Leader
    </h1>
    <ol class="divide-y">
        <li class="mb-3 pt-4">
            <a href="{{route('project.show', $project)}}">
                <div class="hover:text-blue-700">
                    {{ $project->leader->name }}
                </div>
            </a>
        </li>
    </ol>
</section>
