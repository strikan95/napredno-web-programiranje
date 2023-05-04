<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('public.task.index') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                <div class="grid grid-cols-12 gap-y-3">
                    @foreach($tasks as $task)
                        <h1 class="col-span-10">{{ __('public.task.title') . $task->title }}</h1>
                        <form class="ml-auto col-span-2" method="POST" action="{{ route('public.task.apply', $task) }}">
                            @csrf
                            <x-primary-button class="ml-auto">
                                {{ __('public.task.apply') }}
                            </x-primary-button>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
