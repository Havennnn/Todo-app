<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class TaskForFirstUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the first user. If none exists, create a seeded user.
        $user = User::first();

        // Create 20 tasks attached to the found/created user.
        Task::factory()->count(20)->create([
            'user_id' => $user->id,
        ]);
    }
}
