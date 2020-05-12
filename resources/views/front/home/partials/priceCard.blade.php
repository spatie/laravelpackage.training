<div class="md:flex items-stretch block bg-white">
    <div class="p-12">
        <span class="flex flex-col justify-center items-center pb-4 border-b-2 border-blue-100">
            <h3 class="uppercase font-medium text-sm text-center tracking-widest text-blue-400">
               Single license
            </h3>
            {{--
            <div class="inline-block px-4 py-1 mt-2 rounded-sm tracking-normal bg-orange-500 text-dark-900">
                Ends on <span class="font-semibold">March 20<sup>th</sup></span>

                <span class="absolute top-0 left-0 -m-1 w-2 h-2 rounded-full bg-white"></span>
                <span class="absolute top-0 right-0 -m-1 w-2 h-2 rounded-full bg-white"></span>
                <span class="absolute bottom-0 left-0 -m-1 w-2 h-2 rounded-full bg-white"></span>
                <span class="absolute bottom-0 right-0 -m-1 w-2 h-2 rounded-full bg-white"></span>
            </div>--}}
        </span>

        <div class="my-8 text-center">
            <p class="inline-flex leading-none">
                <span class="absolute right-full text-blue-300 text-xl mt-1 mr-2">$</span>
                <span class="font-semibold text-blue-900 text-5xl tracking-wide">149</span>
            </p>
            {{--
            <p class="mt-3 text-center uppercase font-medium text-sm text-gray-400">
                <span class="uppercase tracking-widest">Instead of</span>
                <span class="currency">$</span><span class="font-bold tracking-widest">149</span>
            </p>--}}
        </div>

        <p class="mt-12 text-center">
        <a href="{{ route('register') }}" class="button text-xl">
                Grab your license
            </a>
        </p>
    </div>

    <div class="flex-1 p-12 bg-gray-100 grid" style="align-content: center">
        <h2 class="markup-h2">What you get:</h2>
        <ul class="mt-4 markup-ul grid gap-4">
            <li>
                <div>
                    Email campaign software
                    <div class="text-xs opacity-75">As both app &amp; package for Laravel</div>
                </div>
            </li>
            <li>
                <div>
                    Video course on the internals
                    <div class="text-xs opacity-75">Learn from open source veterans SPATIE</div>
                </div>
            </li>
            <li>
                <div>
                    1 year of updates
                    <div class="text-xs opacity-75">No subscription costs</div>
                </div>
            </li>
        </ul>
    </div>
</div>
