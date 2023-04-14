<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const LIMIT = 25;

    public function index(Project $project, Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        $users = User::all()->skip(($page - 1) * self::LIMIT)->take(self::LIMIT);

        return view('user.index',
            [
                'users' => $users,
                'project' => $project
            ]
        );
    }

    public function show(User $user)
    {
        if(auth()->id() === $user->id)
        {
            return redirect(route('dashboard'));
        }

        return view('user.show',
            [
                'user' => $user,
                'projects' => $user->projects()->get(),
                'collaborations' => $user->collabs()->get()
            ]
        );
    }
}
