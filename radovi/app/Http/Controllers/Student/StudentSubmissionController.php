<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class StudentSubmissionController extends Controller
{

    public function index()
    {
        $tasks = auth()->user()->submitted()->get();
        return view(
            'submissions.student-submissions',
            [
                'tasks' => $tasks
            ]
        );
    }
    public function applyToTask(Task $task)
    {
        // Get # submissions from user for setting the priority
        $nSubmissions = (count(auth()->user()->submitted()->get()) + 1) * 256;
        $task->submissions()->attach(auth()->user(), ['priority' => $nSubmissions]);

        return redirect(route('task.index'));
    }

    public function updateTaskPriority(Request $request, Task $task)
    {
        /** @var User $user */
        $user = auth()->user();
        $submissions = $user->submitted()->get()->toArray();

        $request->validate([
            'priority' => ['required', 'integer', 'min:1', 'max:5']
        ]);

        $priority = $request->priority;

        if(count($submissions) < 2) return redirect(route('student.submissions.index'));


        if($priority == 1)
        {
            $newPriority = $submissions[0]['pivot']['priority'] / 2;

        } elseif ($priority == count($submissions))
        {
            $newPriority = $submissions[count($submissions) - 1]['pivot']['priority'] + (256 / 2);
        } else
        {
            $n1 = $submissions[$priority - 1]['pivot']['priority'];
            $n2 = $submissions[$priority]['pivot']['priority'];
            $gap = $n2 - $n1;

            $newPriority = $n1 + ($gap / 2);
        }

        Submission::query()
            ->where('student_id', '=', $user->id)
            ->where('task_id', '=', $task->id)
            ->update(['priority' => $newPriority]);


        return redirect(route('student.submissions.index'));
    }
}
