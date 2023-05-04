<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('public.professor.dashboard') }}
            </h2>
            <div class="flex ml-auto space-x-8">
                <a href="{{ route('task.create') }}"> {{ __('public.task.create') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                <h1 class="pl-2 pb-4 text-4xl font-extrabold dark:text-white">{{ __('public.task.assigned') }}</h1>
                <div class="divide-y">
                    @if(count($assignedTasks) > 0)
                        @foreach($assignedTasks as $task)
                            <div class="p-2 flex full-width">
                                <a class="hover:text-blue-700" href="{{ route('task.show', $task) }}">
                                    <h1>{{ __('public.task.title') . $task->title }}</h1>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <h1>{{ __('public.task.none') }}</h1>
                    @endif
                </div>
            </div>
        </section>


        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                <h1 class="pl-2 pb-4 text-4xl font-extrabold dark:text-white">{{ __('public.task.unassigned') }}</h1>
                <div class="grid grid-cols-12 gap-y-3">
                    @if(count($unassignedTasks) > 0)
                        @foreach($unassignedTasks as $task)
                            <a class="col-span-10 hover:text-blue-700"
                               href="{{ route('task.submissions.index', $task) }}">
                                <h1>{{ __('public.task.title') . $task->title }}</h1>
                            </a>

                            <a  class="ml-auto col-span-2 hover:text-blue-700 cursor-pointer"
                                href="{{ route('task.submissions.index', $task) }}">
                                {{__('public.subs.show.subs')}}
                            </a>
                        @endforeach
                    @else
                        <h1>{{ __('public.task.none') }}</h1>
                    @endif
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
