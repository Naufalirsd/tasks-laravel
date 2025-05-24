<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Generates a user if not provided
            'task_name' => $this->faker->sentence(3),
            'is_completed' => $this->faker->boolean(30), // 30% completed by default
        ];
    }
}