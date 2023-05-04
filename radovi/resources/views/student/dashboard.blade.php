<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('public.dashboard') }}
            </h2>
            <div class="flex ml-auto space-x-8">
                @if(!$assignedTask)
                    <a href="{{ route('task.index') }}"> {{ __('Select Tasks') }}</a>
                    <a href="{{ route('student.submissions.index') }}"> {{ __('View Ranks') }}</a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                @if($assignedTask != null)
                    <h1>{{ __('public.task.title') }}{{ $assignedTask->title }}</h1>
                @else
                    <h1>{{ __('public.task.appear.here') }}</h1>
                @endif
            </div>
        </section>
    </div>
</x-app-layout>
