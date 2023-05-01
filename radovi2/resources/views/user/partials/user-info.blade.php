<section>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
            Projects
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <ol class="relative p-4 text-gray-900 border-l border-gray-200 divide-y dark:border-gray-700">
                @if(count($projects) > 0)
                    @foreach($projects as $project)
                        <li class="mb-6 pt-6 ml-6">
                            <a href="{{route('project.show', $project)}}">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $project->title }}
                                </h3>
                            </a>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                Created on {{$project->created_at}}
                            </time>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ $project->description }}
                            </p>
                        </li>
                    @endforeach
                @else
                    <li class="mb-6 pt-6 ml-6">
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                            No projects.
                        </h3>
                    </li>
                @endif
            </ol>
        </div>
    </div>

    <div class="pt-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
            Collaborations
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <ol class="relative p-4 text-gray-900 border-l border-gray-200 divide-y dark:border-gray-700">
                @if(count($collaborations) > 0)
                    @foreach($collaborations as $collab)
                        <li class="mb-6 pt-6 ml-6">
                            <a href="{{route('project.show', $collab)}}">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $collab->title }}
                                </h3>
                            </a>
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                Created on {{$collab->created_at}}
                            </time>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ $collab->description }}
                            </p>
                        </li>
                    @endforeach
                @else
                    <li class="mb-6 pt-6 ml-6">
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                            No collabs.
                        </h3>
                    </li>
                @endif
            </ol>
        </div>
    </div>
</section>
