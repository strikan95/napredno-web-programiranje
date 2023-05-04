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
                    @foreach($submissions as $submission)
                        <div class="col-span-10">
                            <h1>{{ __('public.student.name') . $submission->first_name }}</h1>
                        </div>
                        <form class="ml-auto col-span-2" method="POST" action="{{ route('task.submission.accept', [$task, $submission->id]) }}">
                            @csrf
                            <x-primary-button class="ml-auto">
                                {{ __('public.student.accept') }}
                            </x-primary-button>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
