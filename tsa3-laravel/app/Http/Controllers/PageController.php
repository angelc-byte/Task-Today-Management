<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $today = today();
        $tasks = Task::query()
            ->whereDate('task_date', $today)
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
            ->orderBy('id')
            ->get();

        return view('home', compact('tasks', 'today'));
    }

    public function profile(): View
    {
        return view('profile', ['user' => User::query()->first()]);
    }

    public function about(): View
    {
        return view('about');
    }
}
