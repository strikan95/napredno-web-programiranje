<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <section>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                    Unapproved Users
                </h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <ol class="relative p-4 text-gray-900 border-l border-gray-200 divide-y dark:border-gray-700">
                        @if(count($unapprovedUsers) > 0)
                            @foreach($unapprovedUsers as $unapprovedUser)
                                <div class="mb-6 pt-6 ml-6 flex">
                                    <div class="flex space-x-8">
                                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                            Name: {{ $unapprovedUser->name }}
                                        </h3>
                                        <p class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                            Type: {{ $unapprovedUser->type }}
                                        </p>
                                    </div>
                                    <div class="flex ml-auto space-x-8">
                                        <form method="POST" action="{{ route('admin.approve', $unapprovedUser) }}">
                                            @csrf
                                            <button class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white hover:text-blue-700">
                                                Approve
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <li class="mb-6 pt-6 ml-6">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    No new unapproved users.
                                </h3>
                            </li>
                        @endif
                    </ol>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
