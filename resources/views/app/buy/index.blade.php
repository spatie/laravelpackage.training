@extends('app.layouts.master')

@section('title', 'Purchases')

@section('content')
    <h1>Buy video course</h1>

    <p>Almost there!
    <br>
    The button below will take you to our payment provider to handle the purchase.</p>


    @include('app.buy.partials.paddle')

    <div class="my-8">
        <x-buy-button :product="$videosProduct">
            <i class="fas fa-play text-orange-500 mr-3"></i> Purchase video course for ${{ $videosProduct->price }}
        </x-buy-button>
    </div>

    <div class="mt-8 text-xs text-gray-500">
        All purchases are personal. Contact us if you're interested in buying multiple licenses for your team.
    </div>

@endsection
