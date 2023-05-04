<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('public.role.edit.for') . $user->first_name . ' ' . $user->last_name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-3 m-2 shadow-md">
                <form method="POST" action="{{ route('admin.users.role.set', $user) }}">
                    @csrf
                    <!-- User type -->
                    <div class="mt-4">
                        <x-input-label for="user_type" :value="__('public.role.select')" />
                        <div class="items-center w-full text-sm font-medium text-gray-900 bg-white sm:flex dark:bg-gray-700 dark:text-white space-x-8">
                        @foreach($roles as $role)
                            <div class="flex items-center pl-3">
                                @if($user->role == $role)
                                    <input id="student-radio"
                                           checked="checked"
                                           type="radio"
                                           value="{{ $role }}"
                                           name="role"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">

                                @else
                                    <input id="student-radio"
                                           type="radio"
                                           value="{{ $role }}"
                                           name="role"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                @endif
                                <label for="student-radio" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$role}}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('public.role.save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>
