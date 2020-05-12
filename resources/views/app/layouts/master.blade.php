<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="dns-prefetch" href="//use.fontawesome.com">
        <link rel="dns-prefetch" href="//www.googletagmanager.com">
        <link rel="dns-prefetch" href="//rsms.me">
        @include('shared.partials.gtm-head')

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Mailcoach</title>
        <meta name="description" content="Mailcoach is a self-hosted dashboard for email newsletters. Everything you’d expect from an email list manager —in a modern Laravel jacket.">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @include('shared.partials.favicon')

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:creator" content="@spatie_be"/>
        <meta name="twitter:site" content="@spatie_be"/>
        <meta name="twitter:title" content="Self-host your email newsletter"/>
        <meta name="twitter:description"
        content="Mailcoach is a self-hosted dashboard for email newsletters. Everything you’d expect from an email list manager —in a modern Laravel jacket."/>
        <meta name="twitter:image" content="https://laravelpackage.training/images/social-card.jpg"/>

        <meta property="og:site_name" content="Mailcoach">
        <meta property="og:locale" content="en_US">
        <meta property="og:url" content="https://laravelpackage.training"/>
        <meta property="og:type" content="product"/>
        <meta property="og:title" content="Self-host your email newsletter"/>
        <meta property="og:description"
            content="Mailcoach is a self-hosted dashboard for email newsletters. Everything you’d expect from an email list manager —in a modern Laravel jacket."/>
        <meta property="og:image" content="https://laravelpackage.training/images/social-card.jpg"/>
    </head>
    <body class="flex flex-col w-full min-h-screen bg-blue-100">
        @include('shared.partials.scoop')

        <header class="layout-col z-10">
            <div class="{{ isset($inversNav) && $inversNav ? 'text-white border-light-100' : 'border-dark-50' }} py-6 border-b-2   | sm:flex sm:justify-between sm:items-center ">
                @include('front.partials.logo')

                @include('shared.partials.nav')
            </div>
        </header>

        <main class="z-10 mt-8 -mb-24">
            <div class="absolute w-full top-0" style="bottom: 4rem">
                @include('front.partials.swooshBottom')
            </div>
            <section class="layout-col">
                <div class="sm:flex items-start">
                    @yield('sidebar')

                    <div class="flex-grow block bg-white z-10 shadow-2xl rounded-b overflow-hidden | lg:rounded">
                        <div class="markup markup-links p-12">
                            @if(flash()->message)
                            <div class="mb-12 alert {{ flash()->class }}">
                                    {{ flash()->message }}
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </main>

        @include('front.partials.footer')

        @yield('javaScript-body')

        @include('shared.partials.gtm-body')
    </body>
</html>
