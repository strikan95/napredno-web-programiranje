<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('A Project') }}
            </h2>
            <a href="{{ route('project.edit', $project) }}" class="ml-auto hover:text-blue-700 cursor-pointer">
                Edit Project
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-2 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                {{ $project->title }}
            </h2>

            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                {{ $project->description }}
            </p>

            <div class="grid grid-cols-3">
                <div class="col-span-1">
                    @include('project.partials.show-leader')
                    @include('project.partials.show-collaborators')
                </div>

                <div class="col-span-2">
                    @include('project.partials.show-tasks')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
