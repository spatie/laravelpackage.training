<header class="text-white">
    <p class="font-bold font-serif text-3xl sm:text-6xl mt-12 leading-tight">Learn how to create <br>a Laravel package</p>

    <h1 class="mt-2 markup-baseline text-orange-400 opacity-100 text-2xl">Start this course and publish your first package in the same day</h1>

</header>
<div class="py-16 grid lg:cols-2 gap-16">


    <div class="bg-white shadow-xl">
        <div class="   px-8 py-4">
            <h1
                class="inline-block  mx-auto font-bold text-2xl left-1/2  bg-orange-400 px-4 py-2 transform -translate-y-8 shadow-xl">
                Big v2 update</h1>
        </div>
        <div class=" px-8 py-4">
            <ul class="mt-4 mb-12 markup-ul grid gap-4">
                <li>
                    <div>
                        Vastly <strong>improved workflow</strong>
                    </div>
                </li>
                <li>
                    <div>
                        Examples updated to use the <strong>PackageServiceProvider</strong>
                    </div>
                </li>

                <li>
                    <div>
                        Updated for <strong>PHP 8, Laravel 8</strong>
                    </div>
                </li>
                <li>
                    <div>
                        Using modern GitHub action workflows to run tests, update changelog and more
                    </div>
                </li>
                <li>
                    <div>
                        Testing via <strong>Pest</strong> and <strong> PHPUnit</strong>
                    </div>
                </li>
                <li>
                    <div>
                        Videos now in <strong>glorious 4K</strong>
                    </div>
                </li>
            </ul>

        </div>

        <div class="flex justify-center pb-8">
            <a href="{{ spatieUrl(config('settings.buy_url')) }}" class=" button text-xl">
                Buy the complete course
            </a>
        </div>



    </div>
    <div class="mx-auto max-w-3xl">

        <!--
        <p class="inline-block py-2 px-4 bg-orange-400 font-bold uppercase mb-4">
            Big 2021 update
        </p>
    -->


        <p class=" text-xl lg:text-white">
            Having produced over <a href="https://packagist.org/?query=spatie">200 packages</a> with more than 200
            million downloads in total, the <a href="{{spatieUrl()}}" target="_blank" rel="noopener noreferrer"
                class="markup-link-invers text-black">Spatie</a> team knows what they're talking about.
        </p>
        <p class="mt-4 text-xl lg:text-white">
            Dive in the mind of the people that brought you quality packages like
            <code
                class="text-lg opacity-75"><a href="{{spatieUrl('https://docs.spatie.be/laravel-permission/v3/introduction')}}">laravel-permission</a></code>,
            <code
                class="text-lg opacity-75"><a href="{{spatieUrl('https://docs.spatie.be/laravel-backup')}}">laravel-backup</a></code>,
            <code class="text-lg opacity-75"><a href="https://github.com/spatie/browsershot">browsershot</a></code>,
            <code
                class="text-lg opacity-75"><a href="{{spatieUrl('https://docs.spatie.be/laravel-medialibrary')}}">laravel-medialibrary</a></code>
            and learn how to program, test, and maintain your very own packages.
        </p>
    </div>
</div>

<div class="flex justify-center mt-12" x-data="{ open: false }">
    <div class="w-full max-w-3xl">
        <div role="button" class="aspect-16x9" @click="open = true">
            <div class="group absolute inset-0 grid place-center bg-gray-700 rounded-t shadow-xl | lg:rounded">
                <img alt="Screenshot"
                    class="absolute w-full h-full object-cover opacity-75 group-hover:opacity-100 transition-opacity duration-300"
                    src="/images/intro.jpg">
                <span class="bg-dark-800 text-white rounded-sm px-3 py-1">
                    <i class="fas fa-play text-blue-300"></i> <span class="ml-2 text-xs uppercase tracking-widest">Watch
                        example</span>
                </span>
            </div>
        </div>
    </div>

    <template x-if="open">
        <div class="fixed inset-0 p-8 lg:p-16 bg-backdrop z-50 flex items-center justify-center"
            @keydown.window.escape="open = false">
            <button class="absolute top-0 right-0 m-6 leading-none text-light-700 text-3xl">&times;</button>
            <div class="w-full max-w-screen-xl">
                <div class="bg-white rounded-sm aspect-16x9 shadow-xl">
                    <iframe src="https://player.vimeo.com/video/418813035?autoplay=1"
                        class="absolute inset-0 border-2 border-white rounded-sm" frameborder="0"
                        allow="autoplay; fullscreen" allowfullscreen @click.away="open = false"></iframe>
                </div>
            </div>
        </div>
    </template>
</div>
