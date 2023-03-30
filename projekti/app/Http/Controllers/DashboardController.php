<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $projects = $user->projects()->get();
        $collaborations = $user->collabs()->get();

        return View(
            'dashboard',
            [
                'projects' => $projects,
                'collaborations' => $collaborations
            ]
        );
    }
}
