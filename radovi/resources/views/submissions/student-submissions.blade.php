<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('public.subs.index') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                <div class="grid grid-cols-12 gap-y-3">
                    @foreach($tasks as $key => $task)
                        <div class="col-span-10">
                            <h1>{{ __('public.task.title') . $task->title }}</h1>
                            <p>{{ __('public.priority') . $task->pivot->priority }}</p>
                        </div>
                        <form class="ml-auto col-span-2" method="POST" action="{{ route('task.priority', $task->id) }}">
                            @csrf
                            <div>
                                <x-input-label for="priority" :value="__('public.priority')" />
                                <x-text-input id="priority" class="block mt-1 w-full" type="number" name="priority" :value="$key + 1" required autofocus />
                                <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                            </div>
                            <x-primary-button class="ml-auto">
                                {{ __('priority.set') }}
                            </x-primary-button>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
