@extends('layouts.app')

@section('title', 'All Tasks | Tasks for Today')

@section('content')
    <section class="page-hero">
        <p class="eyebrow">Complete overview</p>
        <h1>Every task,<br>one clear view.</h1>
        <p>All seeded tasks are listed in date order so you can see what is done, what is due, and what comes next.</p>
    </section>

    <section class="section directory-section">
        <div class="summary-grid">
            <div><span>Total</span><strong>{{ $tasks->count() }}</strong></div>
            <div><span>Pending</span><strong>{{ $tasks->where('status', 'pending')->count() }}</strong></div>
            <div><span>Completed</span><strong>{{ $tasks->where('status', 'completed')->count() }}</strong></div>
        </div>
        <div class="table-wrap">
            <table>
                <thead><tr><th>Task</th><th>Date</th><th>Status</th></tr></thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td><div class="table-task"><span class="check">{{ $task->status === 'completed' ? '✓' : '' }}</span><strong>{{ $task->title }}</strong></div></td>
                            <td>{{ $task->task_date->format('M d, Y') }}</td>
                            <td><span class="status status-{{ $task->status }}">{{ ucfirst($task->status) }}</span></td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No tasks are available.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
