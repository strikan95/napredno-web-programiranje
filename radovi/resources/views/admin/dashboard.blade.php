<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('public.admin.dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                    {{ __('public.admin.unapproved.users') }}
                </h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <ol class="relative p-4 text-gray-900 border-l border-gray-200 divide-y dark:border-gray-700">
                        @if(count($unapprovedUsers) > 0)
                            @foreach($unapprovedUsers as $unapprovedUser)
                                <div class="mb-6 pt-6 ml-6 flex">
                                    <div class="flex space-x-8">
                                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ __('public.name') }} {{ $unapprovedUser->first_name }} {{ $unapprovedUser->last_name }}
                                        </h3>
                                        <p class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ __('public.role') }} {{ $unapprovedUser->role }}
                                        </p>
                                    </div>
                                    <div class="flex ml-auto space-x-8">

                                        <a href="{{ route('admin.users.role.edit', $unapprovedUser) }}">
                                            {{ __('public.role.edit') }}
                                        </a>

                                        <form method="POST" action="{{ route('admin.users.approve', $unapprovedUser) }}">
                                            @csrf
                                            <button class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white hover:text-blue-700">
                                                {{ __('public.admin.approve') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <li class="mb-6 pt-6 ml-6">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ __('public.admin.unapproved.users.none') }}
                                </h3>
                            </li>
                        @endif
                    </ol>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
