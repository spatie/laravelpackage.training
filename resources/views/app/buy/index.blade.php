@extends('app.layouts.master')

@section('title', 'Purchases')

@section('content')
    <h1>Buy the course</h1>

     <p class="alert alert-info mb-12">
        Almost there!
        <br>
        The button below will take you to our payment provider Paddle to handle the purchase.
    </p>


    @include('app.buy.partials.paddle')

    <div class="my-8">
        <x-buy-button :product="$videosProduct">
            <i class="fas fa-play text-blue-200 mr-3"></i> Purchase video course
        </x-buy-button>
    </div>

    <div class="mt-8 text-xs text-gray-500">
        All purchases are personal. <a href="mailto:info@spatie.be">Contact us</a> if you're interested in buying multiple licenses for your team.
    </div>

@endsection
