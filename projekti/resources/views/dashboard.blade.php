<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex ml-auto">
                <a href="{{ route('project.create') }}" class="hover:text-blue-700 cursor-pointer">
                    Create a project
                </a>
                <a href="{{ route('profile.edit') }}" class="hover:text-blue-700 cursor-pointer">
                    Edit Profile
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                My Projects
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ol class="relative p-4 text-gray-900 border-l border-gray-200 divide-y dark:border-gray-700">
                    @if(count($projects) > 0)
                        @foreach($projects as $project)
                        <li class="mb-6 pt-6 ml-6">
                            <a href="{{route('project.show', $project)}}">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $project->title }}
                                    <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">
                                        Project Leader
                                    </span>
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
                                        <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ml-3">
                                    Project Leader
                                </span>
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
    </div>
</x-app-layout>
