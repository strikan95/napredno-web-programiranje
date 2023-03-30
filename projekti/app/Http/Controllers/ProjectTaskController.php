<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function store(Project $project)
    {
        $project->tasks()->create(
            [
                'user_id' => \request()->user()->id,
                'description' => \request()->description
            ]
        );

        return back();
    }

    public function update(Project $project, Task $task)
    {
        $task->description = \request()->description;
        $task->update();
        return back();
    }
}
