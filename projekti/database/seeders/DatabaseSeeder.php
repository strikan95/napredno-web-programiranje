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
        // Test user
        $user = User::factory()->create(
            [
                'name' => 'strikan',
                'email' => 'strikan@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );
        $project = Project::factory(5)->create(['project_leader_id' => $user->id]);

        $collaborators = User::factory(5)->create();
        foreach ($collaborators as $collaborator)
        {
            $project[0]->collaborators()->attach($collaborator->id);
        }

        Task::factory(10)->create(
            [
                'user_id' => $collaborators[random_int(0, 4)]->id,
                'project_id' => $project[0]->id
            ]
        );

        // Add random unconnected users
        $users = User::factory(5)->create();

/*        $collaborators = User::factory(5)->create()
            ->each(function ($user) {
            Project::factory(random_int(1,5))
                ->create(
                    ['project_leader_id' => $user->id]
                );
        });*/


        // Generate other random users
        //$users = User::factory(15)->create();


        //  --------------------------------- Test user projects  ---------------------------------
        // Generate and assign projects to test user
/*        $tProjects = Project::factory(3)->create();
        foreach ($tProjects as $project)
        {
            $project->leader()->associate($tUser);
        }*/

        // Generate project with collaborators for test user
/*        $tProject = Project::factory()->create(['project_leader_id' => $tUser->id, 'title'=>'Project with collaborators']);
        foreach ($users as $user)
        {

        }*/

        //  --------------------------------- Projects for other users ---------------------------------
        // Assign random n of projects to each other user
/*        foreach ($users as $user)
        {
            Project::factory(random_int(1, 5))->create(['project_leader_id' => $user->id]);
        }*/
    }
}
