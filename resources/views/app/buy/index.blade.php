@extends('app.layouts.master')

@section('title', 'Purchases')

@section('content')
    <h1>Purchases</h1>

    @include('app.buy.partials.paddle')

    <h2>Buy the video course</h2>

    <div class="grid sm:cols-auto-1fr items-center justify-start gapx-8 gapy-4">
        <x-buy-button :product="$videosProduct">
            Purchase video course ${{ $videosProduct->price }}
        </x-buy-button>
    </div>

@endsection
