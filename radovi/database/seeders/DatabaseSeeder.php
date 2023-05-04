<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\Role;
use App\Models\Submission;
use App\Models\Task;
use App\Models\User;
use App\Util\Roles;
use App\Util\StudyType;
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
        /** @var User $professorUser */
        $adminUser = User::factory()->create(
            [
                'first_name' => 'Admin',
                'last_name' => 'Adminovic',
                'study_type' => null,
                'email' => 'admin@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'approved_at' => now(),
                'email_verified_at' => now(),

                'role' => Roles::ROLE_ADMIN,

                'remember_token' => Str::random(10),
            ]
        );

        // Test user 1
        /** @var User $studentUser */
        $studentUser = User::factory()->create(
            [
                'first_name' => 'Student',
                'last_name' => 'Studenovic',
                'study_type' => StudyType::UNDERGRADUATE,
                'email' => 'student@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'approved_at' => now(),
                'email_verified_at' => now(),

                'role' => Roles::ROLE_STUDENT,

                'remember_token' => Str::random(10),
            ]
        );

        // Test user 1
        /** @var User $professorUser */
        $professorUser = User::factory()->create(
            [
                'first_name' => 'Professor',
                'last_name' => 'Profesoric',
                'study_type' => null,
                'email' => 'professor@mail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'approved_at' => now(),
                'email_verified_at' => now(),

                'role' => Roles::ROLE_PROFESSOR,

                'remember_token' => Str::random(10),
            ]
        );


        $tasksGraduate = Task::factory(10)->create(
            [
                'professor_id' => $professorUser->id,
                'study_type' => StudyType::GRADUATE
            ]
        );

        $i = 1;
        foreach ($tasksGraduate as $task)
        {
            $task->title = 'Graduate Task ' . $i;
            $task->save();
            $i++;
        }

        $tasksUndergraduate = Task::factory(10)->create(
            [
                'professor_id' => $professorUser->id,
                'study_type' => StudyType::UNDERGRADUATE
            ]
        );

        $i = 1;
        foreach ($tasksUndergraduate as $task)
        {
            $task->title = 'Undergraduate Task ' . $i;
            $task->save();
            $i++;
        }


        $underGradStudents = User::factory(50)->create(
            [
                'study_type' => StudyType::UNDERGRADUATE,
                'approved_at' => now(),
                'email_verified_at' => now(),

                'role' => Roles::ROLE_STUDENT,

                'remember_token' => Str::random(10),
            ]
        );

        foreach ($underGradStudents as $student)
        {
            // Randomize and take 5
            $shuffled = $tasksUndergraduate->shuffle(rand());
            $sliced = $shuffled->slice(0, 5);

            $i = 1;
            foreach ($sliced as $task)
            {
                $submission = new Submission(
                    [
                        'student_id' => $student->id,
                        'task_id' => $task->id,
                        'priority' => ($i++) * 256,
                        'valid' => true
                    ]
                );

                $submission->save();
            }
        }
    }
}
