@extends('app.layouts.master')

@section('title', 'Account')

@section('content')
    <h1>GitHub access</h1>

    <p class="mb-6">
        <a href="{{ route('account') }}">Back to account</a>
    </p>

    @if(! $user->hasAccessToRepo())
        @if ($user->activeLicenses->count() === 0)
            <p class="alert alert-info">
                You need to have an active <a href="{{ route('licenses') }}">Mailcoach license</a> to configure access to the GitHub repo <strong>laravel-mailcoach</strong>.
            </p>
        @else
        <p class="alert alert-info">
            Configure access to the GitHub repo <strong>laravel-mailcoach</strong>.
        </p>
        <a class="button" href="{{ route('github.redirect') }}">Connect to GitHub</a>
        @endif
    @else
        <p class="alert alert-info">
            You currently have access to <a href="https://github.com/spatie/laravel-mailcoach">laravel-mailcoach</a>. If you fork the repo, make sure your fork is private.
        </p>
        <form method="post" action="{{ route('github.disconnect') }}">
            @csrf
            @method('delete')
            <button class="button" type="submit">Disconnect from GitHub</button>
        </form>
    @endif
@endsection
