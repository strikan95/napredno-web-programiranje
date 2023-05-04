<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\Models\Task;

class ProfessorDashboardController extends Controller
{
    public function dashboard()
    {
        $unassignedTasks = Task::all()->where('professor_id', '=', auth()->user()->id)->where('student_id', '=', null);
        $assignedTasks = Task::all()->where('professor_id', '=', auth()->user()->id)->where('student_id', '!=', null);

        return view(
            'professor.dashboard',
            [
                'unassignedTasks' => $unassignedTasks,
                'assignedTasks' => $assignedTasks
            ]
        );
    }
}
