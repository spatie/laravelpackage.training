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

        <title>@yield('title') - Laravel Package Training</title>
        <meta name="description" content="The Laravel Package training video course is the best way to learn how to create PHP and Laravel packages">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @include('shared.partials.favicon')

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:creator" content="@spatie_be"/>
        <meta name="twitter:site" content="@spatie_be"/>
        <meta name="twitter:title" content="Learn how to create PHP and Laravel packages"/>
        <meta name="twitter:description"
        content="The Laravel Package training video course is the best way to learn how to create PHP and Laravel packages"/>
        <meta name="twitter:image" content="https://laravelpackage.training/images/social-card.jpg"/>

        <meta property="og:site_name" content="Laravel Package Training Video Course">
        <meta property="og:locale" content="en_US">
        <meta property="og:url" content="https://laravelpackage.training"/>
        <meta property="og:type" content="product"/>
        <meta property="og:title" content="Learn how to create PHP and Laravel packages"/>
        <meta property="og:description"
            content="The Laravel Package training video course is the best way to learn how to create PHP and Laravel packages"/>
        <meta property="og:image" content="https://laravelpackage.training/images/social-card.jpg"/>
        @stack('styles')
    </head>
     <body class="flex flex-col w-full min-h-screen">
        @include('shared.partials.scoop')

        <header class="z-10">
            @if(! isset($inversNav))
                    @include('front.partials.backgroundSmall')
            @endif

            <div class="layout-col">
                <div class="{{ isset($inversNav) && $inversNav ? 'border-b-2 border-light-100' : '' }} text-white py-6  | sm:flex sm:justify-between sm:items-center ">
                    @include('front.partials.logo')

                    @include('shared.partials.nav')
                </div>
            </div>
        </header>

        <main class="flex-1 flex flex-col justify-start z-10 py-16">
            <div class="absolute inset-0 bg-blue-700 opacity-75"> </div>

            <section class="layout-col ">
                <div class="mx-auto w-full z-10 shadow-2xl border-l-4 border-orange-500 bg-white overflow-hidden">
                    <div class="sm:flex items-stretch">
                        @yield('sidebar')

                        <div class="flex-grow block bg-white z-10 overflow-hidden">
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
                </div>
            </section>
        </main>

        <div class="z-20">
            @include('front.partials.footer', ['hideFooter' => true])
        </div>

        @yield('javaScript-body')

        @include('shared.partials.gtm-body')
        @stack('scripts')
    </body>
</html>
