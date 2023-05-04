<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Task;

class StudentDashboardController extends Controller
{
    public function dashboard()
    {
        $task = Task::where('student_id', '=', auth()->user()->id)->first();

        return view(
            'student.dashboard',
            [
                'assignedTask' => $task
            ]
        );
    }
}
