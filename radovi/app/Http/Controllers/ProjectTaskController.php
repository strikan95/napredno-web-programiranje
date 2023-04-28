<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function store(StoreTaskRequest $request, Project $project)
    {
        $this->authorize('createTask', $project);

        $project->tasks()->create(
            [
                'user_id' => \request()->user()->id,
                'description' => \request()->description
            ]
        );

        return back();
    }

    public function update(UpdateTaskRequest $request, Project $project, Task $task)
    {
        $this->authorize('updateTask', [$project, $task]);

        $task->description = \request()->description;
        $task->update();
        return back();
    }

    public function destroy(Project $project, Task $task)
    {
        $this->authorize('destroyTask', [$project, $task]);

        $task->delete();
        return back();
    }
}
