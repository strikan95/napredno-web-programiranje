<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\Role;
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
        // --------------------------------- Generate roles ---------------------------------
        $adminRole = Role::factory()->create(['name' => 'admin']);
        $studentRole = Role::factory()->create(['name' => 'student']);
        $professorRole = Role::factory()->create(['name' => 'professor']);

        // --------------------------------- Generate users ---------------------------------
        // Test user 1
        /** @var User $professorUser */
        $adminUser = User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'approved_at' => now(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );
        $adminUser->roles()->attach($adminRole);

        // Test user 1
        /** @var User $professorUser */
        $studentUser = User::factory()->create(
            [
                'type' => 'student',
                'name' => 'Student',
                'email' => 'student@mail.com',
                'approved_at' => null,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );
        $studentUser->roles()->attach($studentRole);

        // Test user 1
        /** @var User $professorUser */
        $professorUser = User::factory()->create(
            [
                'name' => 'Professor',
                'email' => 'professor@mail.com',
                'approved_at' => now(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );
        $professorUser->roles()->attach($professorRole);
    }
}
