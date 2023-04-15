<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ProjectCollaboratorController extends Controller
{
    public function store(Project $project): RedirectResponse
    {
        $this->authorize('addCollaborator', $project);

        if($project->collaborators()->where('user_id', \request()->collaborator_id)->exists())
        {
            return back();
        }

        $project->collaborators()
            ->attach(
                \request()->collaborator_id
            );

        return redirect(route('project.show', $project));
    }

    public function destroy(Project $project, $collaboratorId): RedirectResponse
    {
        $this->authorize('removeCollaborator', $project);

        $project->collaborators()->detach($collaboratorId);
        return redirect(route('project.show', $project));
    }
}
