<?php

namespace Database\Factories;

use App\Models\Task;
use App\Util\StudyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'professor_id' => 1,
            'title' => fake()->text(),
            'study_type' => StudyType::GRADUATE,
        ];
    }
}
