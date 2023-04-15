<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        // --------------------------------- Generate users ---------------------------------
        // Test user 1
        $testUser1 = User::factory()->create(
            [
                'name' => 'User 1',
                'email' => 'usr1@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );

        // Test user 2
        $testUser2 = User::factory()->create(
            [
                'name' => 'User 2',
                'email' => 'usr2@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );

        // Other Users
        $otherUsers = User::factory(10)->create();


        // --------------------------------- Generate and seed test users projects ---------------------------------
        // Test user 1 projects
        $testUser1Projects = Project::factory(2)->create(['project_leader_id' => $testUser1->id]);
        foreach ($testUser1Projects as $project)
        {
            $this->seedProject($project, $testUser1, $otherUsers->toArray());
        }


        $testUser2Projects = Project::factory(2)->create(['project_leader_id' => $testUser2->id]);
        foreach ($testUser2Projects as $project)
        {
            $this->seedProject($project, $testUser2, array_merge($otherUsers->toArray(), [$testUser1, $testUser2]));
        }

        // --------------------------------- Generate and seed other users projects ---------------------------------


        foreach ($otherUsers as $otherUser)
        {
            $othProjects = Project::factory(2)->create(['project_leader_id' => $otherUser->id]);
            foreach ($othProjects as $othProject)
            {
                $this->seedProject($othProject, $otherUser, array_merge($otherUsers->toArray(), [$testUser1, $testUser2]));
            }
        }
    }

    public function seedProject($project, $owner, $users)
    {
        $nUsrs = random_int(0, 3);

        if($nUsrs < 2) return;

        // Take random n users
        $userSample = array_diff(
            array_rand(
                $users,
                random_int(2, 4)
            ),
            [$owner]
        );

        foreach ($userSample as $index)
        {
            $collaborator = $users[$index];

            // Assign each user to the project as collaborator
            $project->collaborators()->attach($collaborator['id']);

            // Assign random n tasks to the project for the user
            Task::factory(random_int(0, 3))->create(
                [
                    'user_id' => $collaborator['id'],
                    'project_id' => $project->id
                ]
            );
        }
    }
}
