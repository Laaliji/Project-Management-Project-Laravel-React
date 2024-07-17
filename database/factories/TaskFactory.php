<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->sentence,
            "description" => $this->faker->realText(),
            "due_date" => $this->faker->dateTimeBetween("now", "+1 year"),
            "status" => $this->faker->randomElement(["pending", "in_progress", "completed"]),
            "priority" => $this->faker->randomElement(["low", "medium", "high"]),
            "img_path" => $this->faker->imageUrl(),
            "project_id" => Project::factory(),
            "assigned_user_id" => User::factory(),
            "created_by" => User::factory(),
            "updated_by" => User::factory(),
            "created_at" => time(),
            "updated_at" => time()
        ];
    }
}
