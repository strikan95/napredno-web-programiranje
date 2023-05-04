<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Util\StudyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function indexAvailable()
    {
        // Get tasks that users hasn't applied to
        $tasks = Task::whereNotExists(function ($query) {
            $query->select()
                ->from('submissions')
                ->where('submissions.student_id', auth()->user()->id)
                ->whereraw('submissions.task_id = tasks.id');
        })
            ->where('study_type', '=', auth()->user()->study_type)
            ->where('student_id', '=', null)
            ->get();

        return view('task.index',
            [
                'tasks' => $tasks
            ]
        );
    }

    public function create()
    {
        return view('task.create', ['studyTypes' => StudyType::getStudyTypes()]);
    }

    public function store(Request $request)
    {
        $project = new Task();
        $project->professor()->associate(auth()->user());
        $project->title = $request->title;
        $project->save();

        return redirect(route('task.show', $project));
    }

    public function show(Task $task)
    {
        return view('task.show',
            [
                'task' => $task
            ]
        );
    }
}
