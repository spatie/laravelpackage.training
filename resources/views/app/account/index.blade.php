@extends('app.layouts.master')

@section('title', 'Account')

@section('content')
    <h1>My account</h1>

    <ul class="mb-6 markup-ul-alt grid gap-1">
        <li><a href="{{ route('password') }}">Change password</a></li>
        {{-- <li><a href="{{ route('github') }}">Configure GitHub access</a></li>--}}
    </ul>

    <form
        class="form-grid"
        action="{{ route('account') }}"r
        method="POST"
    >
        @csrf
        @method('PUT')

        <x-text-field label="Email" name="email" type="email" :value="$user->email" required />
        <x-text-field label="Name" name="name" :value="$user->name" required />

        <div class="form-buttons">
            <button type="submit" class="button">
                Save user
            </button>
        </div>
    </form>
@endsection
