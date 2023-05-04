<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubmissionApprovalController extends Controller
{
    public function index(Task $task)
    {
        $submissions = $this->findFirstChoices($task);

        return view(
            'submissions.index',
            [
                'submissions' => $submissions,
                'task' => $task
            ]
        );
    }

    public function accept(Task $task, $submissionId)
    {
        $sub = Submission::query()->find($submissionId)->toArray();
        $student = User::query()->find($sub['student_id']);
        $task->student()->associate($student)->save();

        Submission::query()->where('student_id', '=', $student->id)->update(['valid' => false]);
        Submission::query()->where('task_id', '=', $task->id)->update(['valid' => false]);

        return redirect(route('professor.dashboard'));
    }

    private function findFirstChoices(Task $task)
    {
        return DB::select(
            sprintf(
                "
                    SELECT subs.id, subs.student_id, subs.task_id, users.first_name, users.last_name
                    FROM submissions subs
                    RIGHT JOIN users ON users.id = subs.student_id
                    JOIN
                        (
                            SELECT student_id, MIN(priority) as minPrio
                            FROM submissions
                            WHERE valid = true
                            GROUP BY student_id
                        ) tmp
                    ON tmp.student_id = subs.student_id AND tmp.minPrio = subs.priority AND subs.task_id = %d
                    ",
                $task->id)
        );
    }
}

