<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('public.approval') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                <p>{{ __('public.approval.not') }}</p>
            </div>
        </section>
    </div>
</x-app-layout>
