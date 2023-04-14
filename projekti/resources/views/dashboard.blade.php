<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Profile') }}
            </h2>
            <div class="flex ml-auto space-x-8">
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
        @include('user.partials.user-info')
    </div>
</x-app-layout>
