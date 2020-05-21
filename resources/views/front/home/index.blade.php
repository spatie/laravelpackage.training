@extends('front.layouts.master', ['inversNav' => true])

@section('title', 'Learn to create Laravel packages')

@section('description', '')

@section('content')
    @include('front.partials.background')

    <img loading="lazy" style="top:50rem; width:75%; opacity: 0.1" class="absolute right-0 h-auto" src="/images/paint-purple.jpg">

    <main class="z-10 shadow-xl">
            <section class="layout-col">
                @include('front.home.partials.intro')

                <div class="mx-auto -mt-24 grid w-full max-w-xl z-10 shadow-2xl rounded-b | md:max-w-none | md:mt-0 lg:rounded">
                    @include('front.home.partials.priceCard')
                </div>
            </section>

        <div id="toc" class="py-24">
            <section class="layout-col">
                @include('front.home.partials.toc')
            </section>
        </div>

        <div class="flex justify-center">
            <button class="button text-3xl px-12 -mb-8 z-10 shadow-xl">
                <i class="fas fa-play text-blue-200 mr-3"></i>
                Start learning!
            </button>
        </div>

        <div class="py-24 bg-blue-50">

            <img loading="lazy" style="opacity: 0.025" class="absolute inset-0 w-full h-full" style="object-fit: cover; object-position: top center;" src="/images/instructor.jpg">

            <section class="layout-col">
                @include('front.home.partials.instructor')
            </section>
        </div>


    </main>

@endsection
