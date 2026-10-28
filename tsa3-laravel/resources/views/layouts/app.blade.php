<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tasks for Today Laravel management system">
    <title>@yield('title', 'Tasks for Today')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="Tasks for Today home">
            <span class="brand-mark" aria-hidden="true">✓</span>
            <span><strong>Tasks for Today</strong><small>Plan clearly. Finish confidently.</small></span>
        </a>
        <nav class="site-nav" aria-label="Main navigation">
            <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Today</a>
            <a class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">All Tasks</a>
            <a class="{{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
            <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
        </nav>
    </header>

    <main>@yield('content')</main>

    <footer class="site-footer">
        <div><strong>Tasks for Today</strong><p>A focused task-management experience built with Laravel and Eloquent.</p></div>
        <div class="footer-links">
            <a href="{{ route('home') }}">Today</a><a href="{{ route('tasks.index') }}">All Tasks</a>
            <a href="{{ route('profile') }}">Profile</a><a href="{{ route('about') }}">About</a>
        </div>
        <p class="copyright">&copy; {{ date('Y') }} Tasks for Today. IT0049 TSA3.</p>
    </footer>
</body>
</html>
