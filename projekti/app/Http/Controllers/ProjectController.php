<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function create()
    {
        return view('project.create'
        );
    }

    public function show(Project $project)
    {
        return view('project.show',
            [
                'project' => $project
            ]
        );
    }

    public function edit(Project $project)
    {
        return view('project.edit',
            [
                'project' => $project
            ]
        );
    }

    public function store(StoreProjectRequest $request)
    {
        $user = auth()->id();

        $project = new Project();
        $project->project_leader_id = $user;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();

        return redirect(route('project.show', $project));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();

        return redirect(route('project.show', $project));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect(route('dashboard'));
    }
}
