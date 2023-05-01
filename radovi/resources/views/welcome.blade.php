<x-app-layout>
    <div class="flex h-screen justify-center items-center">
        <div>
            <a href="{{ route('login') }}"
               class="text-white bg-blue-700
                    hover:bg-blue-800
                    focus:ring-4 focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2
                    dark:bg-blue-600 dark:hover:bg-blue-700
                    focus:outline-none
                    dark:focus:ring-blue-800">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="width-40 text-white bg-blue-700
                    hover:bg-blue-800
                    focus:ring-4 focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2
                    dark:bg-blue-600 dark:hover:bg-blue-700
                    focus:outline-none
                    dark:focus:ring-blue-800">
                Register
            </a>
        </div>
    </div>
</x-app-layout>
