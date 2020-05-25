@extends('app.layouts.master')

@section('title', 'Videos')

@section('sidebar')
    @include('app.videos.partials.sidebar')
@endsection

@section('content')

    <div class="markup markup-lists markup-links markup-code markup-tables">
        <h1>Laravel package training</h1>
        <p>Welcome to this video course! Let's learn how to program, test, and maintain your very own packages.</p>

            <h2 class="markup-h2 mt-6">What we'll cover:</h2>
            <ul class="mt-4 markup-ul grid gap-4">
                <li>
                    <div>
                        Building a framework agnostic PHP package
                        <div class="text-xs opacity-75">Basic structure, testing, GitHub actions, Packagist, …</div>
                    </div>
                </li>
                <li>
                    <div>
                        Building a Laravel package
                        <div class="text-xs opacity-75">Build a real Laravel package from scratch</div>
                    </div>
                </li>
                <li>
                    <div>
                        Source dive Spatie packages
                        <div class="text-xs opacity-75">Get a tour of real life examples</div>
                    </div>
                </li>
            </ul>

            <p class="mt-12">
                <strong>Select a topic</strong> from the menu <span class="sm:hidden">at the top</span><span class="hidden sm:inline">on the left</span> and start the course!
            </p>
    </div>

@endsection
