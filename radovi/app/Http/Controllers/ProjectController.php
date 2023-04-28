<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Response;

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

    /**
     * @throws AuthorizationException
     */
    public function store(StoreProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $project = new Project();
        $project->project_leader_id = auth()->id();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();

        return redirect(route('project.show', $project));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();

        return redirect(route('project.show', $project));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Project $project)
    {
        $this->authorize('destroy',  $project);

        $project->delete();
        return redirect(route('dashboard'));
    }
}
