<section class="pt-4 pr-4 pl-4 bg-white shadow-md rounded-md">
    <div class="flex pb-1 border-b-2">
        <h1 class="text-xl font-bold">
            Tasks
        </h1>

        <button
            class="ml-auto"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-task-modal')"
        >
            <svg class="h-8 hover:stroke-blue-700 cursor-pointer"
                 aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
        @include('project.partials.task.add')

    </div>

    <div class="w-11/12 mx-auto relative">
        <div class="mt-6 pb-4">
            @if(count($project->tasks) > 0)
                @foreach($project->tasks as $task)
                    <div class="transform transition cursor-pointer hover:-translate-y-1 relative px-2 py-1 bg-green-200 text-white-600 rounded mb-6 space-y-4 md:space-y-0 flex">
                        <!-- Content that showing in the box -->
                        <div class="flex-row">
                            <h1 class="text-md">
                                {{ $task->created_at }}
                            </h1>
                            <h1 class="text-md font-bold">
                                {{ $task->description }}
                            </h1>
                            <h3>
                                {{ $task->user->name }}
                            </h3>
                        </div>

                        <button
                            class="ml-auto"
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'edit-task-modal-{{ $task->id }}')"
                        >
                            <svg
                                class="h-6 hover:stroke-blue-700 cursor-pointer"
                                aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                @endforeach
            @else
                <div class="transform transition cursor-pointer hover:-translate-y-1 relative flex items-center px-2 py-1 bg-red-200 text-white-600 rounded mb-6 flex-col md:flex-row space-y-4 md:space-y-0">
                    <!-- Content that showing in the box -->
                    <div class="flex-auto">
                        <h1 class="text-md font-bold">
                            No tasks.
                        </h1>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{--Modals for editing--}}
    @if(count($project->tasks) > 0)
        @foreach($project->tasks as $task)
            @include('project.partials.task.edit')
        @endforeach
    @endif

</section>
