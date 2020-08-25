@extends('auth.layouts.auth')

@section('title', 'Login')

@section('description', 'Log in to view the Laravel Package Video Course')

@section('auth')
        <h1>{{ __('Login') }}</h1>

        <div class="alert alert-info text-xl">
            We are currently performing maintenance. Please check back in a couple of hours.
            <br/><br/>If you have questions about this, reach out to <a href="mailto:info@spatie.be">info@spatie.be</a>
        </div>

    <div class="alert alert-info text-xl">
        The license and video section of Laravel Package Training has moved to a unified platform.
        From now on, you can log in on <a class="markup-link" href="https://spatie.be/login">https://spatie.be/login</a> to see all of your Spatie products.
    </div>
    <div class="mt-8 text-xl">
        <a href="https://spatie.be/login" class="button text-white">
            {{ __('Visit spatie.be/login') }}
        </a>
    </div>

@endsection
