@extends('front.layouts.master', ['inversNav' => true])

@section('title', 'Learn to create Laravel packages')

@section('description', '')

@section('content')
    @include('front.partials.background')

    <main class="z-10">
        <section class="layout-col">
            @include('front.home.partials.intro')

            <div class="mx-auto -mt-16 grid w-full max-w-2xl z-10 shadow-2xl rounded-b overflow-hidden | lg:-mt-4 lg:rounded">
                @include('front.home.partials.priceCard')
            </div>
        </section>

        <section class="mt-8 pb-24">
            @include('front.partials.swooshTop')
        </section>

        <div class="mt-8 z-10">
            <section class="layout-col">
                @include('front.home.partials.videos')
            </section>
        </div>

        <section class="pt-24 pb-32 -mb-16">
            @include('front.partials.swooshBottom')
        </section>
    </main>

@endsection
