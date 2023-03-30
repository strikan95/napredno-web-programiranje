<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create A Project') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                Project Setup
            </h2>
            <div class="bg-white shadow-sm sm:rounded-lg">
                <form class="p-6 max-w-7xl grid grid-cols-12 gap-y-2" method="post" action="{{ route('project.store') }}">
                    @csrf
                    {{--ROW 1--}}
                    <label class="col-span-2 flex items-center">
                        Project Name
                    </label>
                    <input class="col-span-10 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="title"
                           name="title"
                           type="text"
                           placeholder="Some project title">

                    {{--ROW 2--}}
                    <label class="col-span-2 flex items-center">
                        Project Description
                    </label>
                    <input class=" col-span-10 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="description"
                           name="description"
                           type="text"
                           placeholder="Some project title">

                    {{--ROW 3--}}
                    <label class="col-span-2 flex items-center">
                        Start Date
                    </label>
                    <input class="col-span-4 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-full-name"
                           type="text"
                           placeholder="16/1/23">

                    <label class="pl-2 pr-2 col-span-2 flex justify-end items-center">
                        End Date
                    </label>
                    <input class=" col-span-4 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-full-name"
                           type="text"
                           placeholder="1/1/24">

                    {{--ROW 4--}}
                    <button class="col-span-2 bg-blue-300 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Create Project
                    </button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<div class="flex pb-6">
    <label class="text-md font-semibold text-gray-900 dark:text-white">
        Project Name
    </label>
    <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
        id="inline-full-name"
        type="text"
        value="Some project title">
</div>

<div class="flex pb-6">
    <label class="text-md font-semibold text-gray-900 dark:text-white">
        Project Description
    </label>
    <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
        id="inline-full-name"
        type="text"
        value="This a short project description....">
</div>
