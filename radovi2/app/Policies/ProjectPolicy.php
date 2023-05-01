<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Project $project): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Project $project): bool
    {
        return $this->isLeader($user, $project);
    }

    public function delete(User $user, Project $project): bool
    {
        // Can delete if can update
        return $this->update($user, $project);
    }

    public function createTask(User $user, Project $project): bool
    {
        // Leader and collaborators can create tasks
        return $this->isLeader($user, $project) || $this->isCollaborating($user, $project);
    }

    public function updateTask(User $user, Project $project, Task $task): bool
    {
        // Leader can edit any task
        if($this->isLeader($user, $project)) return true;

        // Users can edit only their own tasks if they are collaborating
        if($this->isCollaborating($user, $project))
        {
            return $this->doesOwnTask($user, $task);
        }

        return false;
    }

    public function destroyTask(User $user, Project $project, Task $task): bool
    {
        // Can destroy task if can edit
        return $this->updateTask($user, $project, $task);
    }

    public function addCollaborator(User $user, Project $project): bool
    {
        // Only leader can add collaborators
        return $this->isLeader($user, $project);
    }

    public function removeCollaborator(User $user, Project $project): bool
    {
        // Can remove if can add
        return $this->addCollaborator($user, $project);
    }

    private function isLeader(User $user, Project $project): bool
    {
        return $project->leader()->is($user);
    }

    private function isCollaborating(User $user, Project $project): bool
    {
        return $project->collaborators()->where('user_id', $user->id)->exists();
    }

    private function doesOwnTask(User $user, Task $task): bool
    {
        return $task->user()->is($user);
    }
}
