@extends('layouts.app')

@section('title', 'About | Tasks for Today')

@section('content')
    <section class="page-hero about-hero">
        <p class="eyebrow">About the project</p>
        <h1>Less clutter.<br>More progress.</h1>
        <p>Tasks for Today turns a simple daily list into a focused Laravel experience powered by migrations, seeders, Blade, and Eloquent.</p>
    </section>
    <section class="section story-grid">
        <div><p class="eyebrow">The purpose</p><h2>Built for focused days.</h2></div>
        <div><p>This project was developed by <strong>Angel C. Tolentino</strong> for IT0049 Web System Technologies. It rebuilds the original task-management activity using Laravel’s MVC structure and database tools.</p><p>The welcome page isolates today’s work, while the complete task list preserves the wider schedule. The result is simple by design: the right information appears exactly where it is needed.</p></div>
    </section>
    <section class="feature-strip"><div><span>01</span><strong>Laravel MVC</strong><p>Controllers keep database queries separate from presentation.</p></div><div><span>02</span><strong>Eloquent</strong><p>Models retrieve and filter structured task and user records.</p></div><div><span>03</span><strong>Blade</strong><p>Reusable layouts produce four consistent, responsive pages.</p></div></section>
@endsection
