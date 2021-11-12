
<div class="py-16 grid lg:cols-2 gap-16">
    <header class="text-white" >


            <div class="mx-auto max-w-3xl">
                <div x-data="{
                    scroll: () => {
                        window.scrollTo({
                            top: document.getElementById('updateCard').getBoundingClientRect().top - 50,
                            left: 0,
                            behavior: 'smooth'
                          });
                    }
                }">

                <h1 @click="scroll()"
                    class="inline-block  text-black cursor-pointer  mx-auto font-bold text-2xl left-1/2  bg-orange-400 px-4 py-2 transform shadow-xl">
                    Big v2 update</h1>

                </div>


                <p class="font-bold font-serif text-3xl sm:text-5xl mt-8 leading-tight">Learn how to create <br>a Laravel package
                </p>

                <h1 class="mt-2 mb-8 markup-baseline text-orange-400 opacity-100 text-2xl">Start this course and publish your first
                    package in the same day</h1>

                <p class=" text-xl text-white">
                    Having produced over <a href="https://packagist.org/?query=spatie">200 packages</a> with more than 200
                    million downloads in total, the <a href="{{spatieUrl()}}" target="_blank" rel="noopener noreferrer"
                        class="markup-link-invers ">Spatie</a> team knows what they're talking about.
                </p>
                <p class="mt-4 text-xl text-white">
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

    </header>



    <div class="flex justify-center items-center " x-data="{ open: {{ request()->query('intro')? 'true' : 'false' }} }">
        <div class="w-full max-w-3xl">
            <div id="intro-button" role="button" class="aspect-16x9" @click="open = true">
                <div class="group absolute inset-0 grid place-center bg-gray-700 rounded-t shadow-xl | lg:rounded">
                    <img alt="Screenshot"
                        class="absolute w-full h-full object-cover opacity-75 group-hover:opacity-100 transition-opacity duration-300"
                        src="/images/introduction.jpg">
                    <span class="mt-32 bg-dark-800 text-white rounded-sm px-3 py-1">
                        <i class="fas fa-play text-blue-300"></i> <span
                            class="ml-2 text-xs uppercase tracking-widest">Watch
                            introduction</span>
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
                        <iframe src="https://player.vimeo.com/video/644709295?autoplay={{ request()->query('intro')? 0 : 1 }}"
                            class="absolute inset-0 border-2 border-white rounded-sm" frameborder="0"
                            allow="autoplay fullscreen" 
                            autoplay
                            allowfullscreen @click.away="open = false"></iframe>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
