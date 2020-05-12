@extends('front.layouts.master', ['inversNav' => true])

@section('title', 'Self-host your email marketing software')

@section('description', 'Mailcoach is a self-hosted solution to send out your email newsletters. We integrate with services like Amazon SES, Mailgun, Postmark or Sendgrid to send out mailings affordably. Everything you’d expect from an email list manager —in a modern jacket.')

@section('content')
    @include('front.partials.background')

    <main class="z-10">
        <section class="layout-col">
            @include('front.home.partials.intro')

            <div class="mx-auto -mt-16 grid w-full max-w-2xl z-10 shadow-2xl rounded-b overflow-hidden | lg:-mt-4 lg:rounded">
                @include('front.home.partials.priceCard')
            </div>
        </section>

        <section class="py-24 pb-32 layout-col">
                @include('front.home.partials.calculator')
        </section>

        <section class="mt-8 pb-24">
            @include('front.partials.swooshTop')

            <div class="layout-col pt-1 mb-24">
                <div class=-mt-16>
                    @include('front.home.partials.testimonials')
                </div>
            </div>

            <div class="layout-col">
                @include('front.home.partials.features')
            </div>
        </section>

        <div class="mt-8 z-10">
            <section class="layout-col">
                @include('front.home.partials.videos')
            </section>
        </div>

        <section class="pt-24 pb-32 -mb-16">
            @include('front.partials.swooshBottom')

            <div class="layout-col">
                @include('front.home.partials.setup')
            </div>
        </section>
    </main>

@endsection
