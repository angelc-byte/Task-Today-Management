<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['username' => 'angeltolentino'],
            ['full_name' => 'Angel C. Tolentino', 'email' => 'angel.tolentino@example.com'],
        );

        $today = today();
        $tasks = [
            ['title' => 'Review Laravel routing notes', 'status' => 'completed', 'task_date' => $today],
            ['title' => 'Finish the Eloquent model activity', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Check migration and seeder output', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Prepare screenshots for submission', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Read the TSA3 activity guide', 'status' => 'completed', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Organize the project workspace', 'status' => 'completed', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Practice Eloquent date filtering', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Review Blade template inheritance', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Submit the GitHub repository link', 'status' => 'pending', 'task_date' => $today->copy()->addDays(2)],
        ];

        $seededTitles = array_column($tasks, 'title');

        // Remove previous copies of the sample records before recreating them.
        // This keeps the seeder repeatable even when it is run on a different day.
        Task::query()->whereIn('title', [
            ...$seededTitles,
            'Submit the GitHub and hosted links',
        ])->delete();

        foreach ($tasks as $task) {
            Task::query()->create($task);
        }
    }
}
