<?php
namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a user
        $user = User::factory()->create([
            'name' => 'Adam',
            'email' => 'adam@example.com',
            'password' => bcrypt("123.321A"),
            'email_verified_at' => now(),
        ]);

        // Create projects and tasks
        Project::factory()
            ->count(30)
            ->hasTasks(30)
            ->create([
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);
    }
}

