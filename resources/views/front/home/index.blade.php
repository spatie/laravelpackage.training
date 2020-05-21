@extends('front.layouts.master', ['inversNav' => true])

@section('title', 'Learn to create Laravel packages')

@section('description', '')

@section('content')
    @include('front.partials.background')

    <img loading="lazy" style="top:50rem; width:75%; opacity: 0.1" class="absolute right-0 h-auto" src="/images/paint-purple.jpg">

    <main class="z-10 shadow-xl">
            <section class="layout-col">
                @include('front.home.partials.intro')

                <div class="mx-auto grid w-full max-w-lg z-10 shadow-2xl rounded | md:max-w-none">
                    @include('front.home.partials.priceCard')
                </div>
            </section>

        <div id="toc" class="py-24">
            <section class="layout-col">
                @include('front.home.partials.toc')
            </section>
        </div>

        @include('front.home.partials.cta')

        <div class="py-24 bg-blue-50">

            <img loading="lazy" style="opacity: 0.035" class="absolute inset-0 w-full h-full" style="object-fit: cover; object-position: top center;" src="/images/instructor.jpg">

            <section class="layout-col">
                @include('front.home.partials.instructor')
            </section>
        </div>


    </main>

@endsection
