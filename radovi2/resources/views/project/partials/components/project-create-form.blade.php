<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Project Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your projects basic information") }}
        </p>
    </header>

    <form method="post" action="{{ route('project.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="title" :value="__('Project Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="Enter project title here" required autofocus autocomplete="title" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Project Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" value="Enter project description here" required autocomplete="description" />
        </div>

        <div class="flex items-center space-x-8">
            <div>
                <x-input-label for="start" :value="__('Start Date')" />
                <input name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
            </div>
            <div>
                <x-input-label for="start" :value="__('End Date')" />
                <input name="end" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
