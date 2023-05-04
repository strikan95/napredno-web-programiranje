<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="firstName" :value="__('First Name')" />
            <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('first_name')" required autofocus autocomplete="firstName" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="lastName" :value="__('Last Name')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('last_name')" required autofocus autocomplete="lastName" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Study type -->
        <div class="mt-4">
            <x-input-label for="study_type" :value="__('Select Study Type')" />

            <div class="items-center w-full text-sm font-medium text-gray-900 bg-white sm:flex dark:bg-gray-700 dark:text-white space-x-8">
                <div class="flex items-center pl-3">
                    <input id="professional-radio"
                           checked="checked"
                           type="radio"
                           value="{{ App\Util\StudyType::PROFESSIONAL}}"
                           name="study_type"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="professional-radio"
                           class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Professional') }}</label>
                </div>

                <div class="flex items-center pl-3">
                    <input id="undergraduate-radio"
                           type="radio"
                           value="{{ App\Util\StudyType::UNDERGRADUATE }}"
                           name="study_type"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="undergraduate-radio"
                           class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Undergraduate') }}</label>
                </div>

                <div class="flex items-center pl-3">
                    <input id="graduate-radio"
                           type="radio"
                           value="{{ App\Util\StudyType::GRADUATE }}"
                           name="study_type"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="graduate-radio"
                           class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Graduate') }}</label>
                </div>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- User type -->
        <div class="mt-4">
            <x-input-label for="user_type" :value="__('Select User Type')" />

            <div class="items-center w-full text-sm font-medium text-gray-900 bg-white sm:flex dark:bg-gray-700 dark:text-white space-x-8">
                <div class="flex items-center pl-3">
                    <input id="student-radio"
                           checked="checked"
                           type="radio"
                           value="{{ App\Util\Roles::ROLE_STUDENT}}"
                           name="role"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="student-radio"
                           class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student</label>
                </div>

                <div class="flex items-center pl-3">
                    <input id="professor-radio"
                           type="radio"
                           value="{{ App\Util\Roles::ROLE_PROFESSOR }}"
                           name="role"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="professor-radio"
                           class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Professor</label>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
