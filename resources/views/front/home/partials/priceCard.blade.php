<div class="md:grid cols-2 items-stretch block bg-white">
    <div class="p-12">
        <span class="flex flex-col justify-center items-center pb-4 border-b-2 border-blue-100">
            <h3 class="uppercase font-medium text-sm text-center tracking-widest text-blue-400">
                Become the next package maestro
            </h3>
        </span>

        @if($couldFetchPrice)
            @if($discount->active)
                <div
                    class="flex flex-col items-center mb-6 text-center text-gray-700 text-xs leading-snug">
                    <div class="mt-4 font-bold text-orange-500">{{ $discount->name }} ending in</div>
                    <div
                        class="bg-orange-500 text-white z-10 px-2 py-1"
                        style="font-variant-numeric:tabular-nums">
                        <x-countdown :expires="$discount->expiresAt()">
                        <span class=""><span
                                x-text="timer.days">{{ $component->days() }}</span> <span class="">days</span></span>
                            <span class=""><span
                                    x-text="timer.hours">{{ $component->hours() }}</span> <span
                                    class="">hours</span></span>
                            <span class=""><span
                                    x-text="timer.minutes">{{ $component->minutes() }}</span> <span
                                    class="">minutes</span></span>
                            <span class=""><span
                                    x-text="timer.seconds">{{ $component->seconds() }}</span> <span
                                    class="">seconds</span></span>
                        </x-countdown>
                    </div>
                </div>
            @endif

            <div class="flex justify-center my-8">
                <div>
                    <span class="font-bold text-5xl">{{ $price->formattedPrice() }}</span>
                    @if($discount->active)
                        <span class="absolute right-full mr-4 top-0 mt-2">
                             <span class="text-gray-500 line-through">{{ $priceWithoutDiscount->formattedPrice() }}</span>
                        </span>
                    @endif
                </div>
            </div>
        @endif

        <p class="mt-2 text-center">
            <a href="{{ spatieUrl(config('settings.buy_url')) }}" class="button text-xl">
                Buy the complete course
            </a>
        </p>
    </div>

    <div class="flex-1 p-12 bg-gray-100 flex flex-col items-center justify-center">
        <h2 class="markup-h2">What you'll learn:</h2>
        <ul class="mt-4 markup-ul grid gap-4">
            <li>
                <div>
                    Building a framework agnostic PHP package
                    <div class="text-xs opacity-75">Basic structure, testing, GitHub actions, Packagist, …</div>
                </div>
            </li>
            <li>
                <div>
                    Building a Laravel package
                    <div class="text-xs opacity-75">Build a real Laravel package from scratch</div>
                </div>
            </li>
            <li>
                <div>
                    Source dive Spatie packages
                    <div class="text-xs opacity-75">Get a tour of real life examples</div>
                </div>
            </li>
        </ul>
        <p class="mt-4">
            <a class="markup-link" href="#toc">See the entire table of contents</a>
        </p>
    </div>
</div>
