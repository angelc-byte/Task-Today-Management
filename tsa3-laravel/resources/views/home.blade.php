@extends('layouts.app')

@section('title', 'Today | Tasks for Today')

@section('content')
    <section class="hero">
        <div>
            <p class="eyebrow">{{ $today->format('l, F j') }}</p>
            <h1>Make today<br><span>count.</span></h1>
            <p class="hero-copy">A clear view of what needs your attention today—nothing more, nothing less.</p>
            <a class="button" href="{{ route('tasks.index') }}">View the full task list <span>→</span></a>
        </div>
        <div class="hero-panel" aria-label="Today's progress">
            <p>Today’s progress</p>
            <strong>{{ $tasks->where('status', 'completed')->count() }}<span>/{{ $tasks->count() }}</span></strong>
            <div class="progress-track"><i style="width: {{ $tasks->count() ? ($tasks->where('status', 'completed')->count() / $tasks->count()) * 100 : 0 }}%"></i></div>
            <small>{{ $tasks->where('status', 'pending')->count() }} tasks still need your attention</small>
        </div>
    </section>

    <section class="section today-section">
        <div class="section-heading">
            <div><p class="eyebrow">Your focus</p><h2>Today’s tasks</h2></div>
            <p>Tasks are pulled directly from the database using an Eloquent date filter.</p>
        </div>

        <div class="task-stack">
            @forelse ($tasks as $task)
                <article class="task-card {{ $task->status === 'completed' ? 'is-complete' : '' }}">
                    <span class="check">{{ $task->status === 'completed' ? '✓' : '' }}</span>
                    <div><h3>{{ $task->title }}</h3><p>{{ $task->task_date->format('M d, Y') }}</p></div>
                    <span class="status status-{{ $task->status }}">{{ ucfirst($task->status) }}</span>
                </article>
            @empty
                <div class="empty-state"><strong>Your schedule is clear.</strong><p>No tasks are planned for today.</p></div>
            @endforelse
        </div>
    </section>
@endsection
