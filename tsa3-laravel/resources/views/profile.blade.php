@extends('layouts.app')

@section('title', 'Profile | Tasks for Today')

@section('content')
    <section class="page-hero profile-hero">
        <p class="eyebrow">Developer profile</p>
        <h1>The person<br>behind the plan.</h1>
    </section>
    <section class="section profile-section">
        @if ($user)
            <article class="profile-card">
                <div class="profile-photo-wrap">
                    <img class="profile-photo" src="{{ asset('images/profile/account-owner.png') }}" alt="Profile photo of {{ $user->full_name }}">
                </div>
                <div class="profile-copy"><p class="eyebrow">Account owner</p><h2>{{ $user->full_name }}</h2><p>IT0049 student developer building organized, database-backed web experiences with Laravel.</p></div>
                <dl><div><dt>Username</dt><dd>{{ $user->username }}</dd></div><div><dt>Email</dt><dd>{{ $user->email }}</dd></div><div><dt>Framework</dt><dd>Laravel</dd></div></dl>
            </article>
        @else
            <div class="empty-state"><strong>No profile found.</strong><p>Run the database seeder to create the developer record.</p></div>
        @endif
    </section>
@endsection
