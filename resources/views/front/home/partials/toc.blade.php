<div class="max-w-3xl mx-auto | lg:ml-0">
    <header class="mb-12">
        <h2 class="markup-h1">Course overview</h2>
        <p class="markup-baseline">4 hours of content</p>
    </header>

    <p class="text-lg">
        For all functionality that is added to a package, you'll learn how to automatically test it, both locally and
        via GitHub Actions.
        This way you can build a beautiful and maintainable package that your co-workers, clients, and the community can
        rely on.
    </p>
    <p class="mt-4 text-lg">
        All videos are available in our online course environment, where you can track your progress.
    </p>
</div>

<div class="flex justify-center items-center mt-12" x-data="{ open: false }">
    <div class="w-full max-w-3xl">
        <div role="button" class="aspect-16x9" @click="open = true">
            <div class="group absolute inset-0 grid place-center bg-gray-700 rounded-t shadow-xl | lg:rounded">
                <img alt="Screenshot"
                    class="absolute w-full h-full object-cover opacity-75 group-hover:opacity-100 transition-opacity duration-300"
                    src="/images/intro.jpg">
                <span class="bg-dark-800 text-white rounded-sm px-3 py-1">
                    <i class="fas fa-play text-blue-300"></i> <span
                        class="ml-2 text-xs uppercase tracking-widest">Watch
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
                    <iframe src="https://player.vimeo.com/video/644708807?h=2ea6d45615&autoplay=1"
                        class="absolute inset-0 border-2 border-white rounded-sm" frameborder="0"
                        allow="autoplay; fullscreen" allowfullscreen @click.away="open = false"></iframe>
                </div>
            </div>
        </div>
    </template>
</div>

<ol class="max-w-3xl mx-auto mt-12 grid gapy-8 markup-ol | lg:max-w-none">
    <li class="pt-8 text-xl">
        <div class="flex-grow">
            <p class="markup-h2">Building a framework agnostic PHP package</p>
            <ul class="mt-6 markup-ul-alt text-lg | md:markup-cols-2">
                <li class="pb-3">Using the Spatie PHP package skeleton to get started building an agnostic package</li>
                <li class="pb-3">Adding a first class to the package</li>
                <li class="pb-3">Testing a package using Pest and PHPUnit</li>
                <li class="pb-3">Automatically fix code style issues locally</li>
                <li class="pb-3">Running the tests on GitHub actions</li>
                <li class="pb-3">Fixing code style issues using GitHub Actions</li>
                <li class="pb-3">Supporting multiple PHP versions</li>
                <li class="pb-3">Using semantic versioning</li>
                <li class="pb-3">Keeping a changelog</li>
                <li class="pb-3">Automatically updating the changelog</li>
                <li class="pb-3">Registering the package on Packagist</li>
                <li class="pb-3">Publishing a new release on GitHub</li>
                <li class="pb-3">Taking care of community contributions</li>
            </ul>
        </div>
    </li>

    <li class="pt-8 text-xl">
        <div class="absolute top-0 w-full max-w-xl">
            <div class="border-t-2 border-blue-100"></div>
        </div>
        <div class="flex-grow">
            <p class="markup-h2">Building a Laravel package</p>
            <ul class="mt-6 markup-ul-alt text-lg | md:markup-cols-2">
                <li class="pb-3">Using the Spatie Laravel package skeleton to get started building a Laravel specific
                    package
                </li>
                <li class="pb-3">Using the specialized Package Service Provider</li>
                <li class="pb-3">Adding a config file to the package</li>
                <li class="pb-3">Adding an artisan command</li>
                <li class="pb-3">Adding models and migrations to the package and how to automatically test them</li>
                <li class="pb-3">Adding routes, controllers and views in a way that they don't conflict with application
                    routes
                </li>
                <li class="pb-3">Running the tests of the Laravel package on GitHub Actions</li>
                <li class="pb-3">Using MySQL in the package tests and on GitHub Actions</li>
                <li class="pb-3">Testing artisan commands using PHPUnit and Orchestra Testbench</li>
                <li class="pb-3">Testing routes, controllers and views</li>
                <li class="pb-3">Supporting multiple PHP and Laravel versions of your package</li>
                <li class="pb-3">Developing a Laravel package inside a full Laravel application</li>
                <li class="pb-3">A whopping 90 minute live coding video where we bring together the knowledge of the
                    entire course to build a real life package from scratch. Watch Freek code and explain his thought
                    process.
                </li>
                <li>Converting an old style service provider to a Package Service Provider</li>
            </ul>
        </div>
    </li>

    <li class="pt-8 text-xl">
        <div class="absolute top-0 w-full max-w-xl">
            <div class="border-t-2 border-blue-100"></div>
        </div>
        <div class="flex-grow">
            <p class="markup-h2">Source diving Spatie packages</p>
            <ul class="mt-6 markup-ul-alt markup-links text-lg | md:markup-cols-2">
                <li class="pb-3"><a href="https://github.com/spatie/laravel-tail">laravel-tail</a>: how to package up a
                    simple artisan command to reuse in all your projects and share with the community
                </li>
                <li class="pb-3"><a href="{{spatieUrl('https://docs.spatie.be/laravel-medialibrary')}}">laravel-medialibrary</a>:
                    learn how we structured this big package to keep it maintainable
                </li>
                <li class="pb-3"><a href="{{spatieUrl('https://docs.spatie.be/laravel-multitenancy')}}">laravel-multitenancy</a>:
                    this source dive shows how a complicated package can remain lightweight. Lots of things to learn
                    about the Laravel internals too.
                </li>
                <li class="pb-3"><a href="https://github.com/spatie/laravel-short-schedule">laravel-short-schedule</a>:
                    during this source dive you'll get an intro into React PHP and learn how you can write tests for a
                    never ending event loop.
                </li>
                <li class="pb-3"><a
                        href="https://github.com/spatie/laravel-collection-macros">laravel-collection-macros</a>: see
                    how we split up large classes into several smaller ones
                </li>
                <li class="pb-3"><a href="https://github.com/spatie/laravel-responsecache">laravel-responsecache</a>:
                    this popular package can make any Laravel application much faster. Learn how we use middleware to
                    achieve this
                </li>
            </ul>
        </div>
    </li>
</ol>
