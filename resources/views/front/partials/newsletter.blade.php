@if(session()->has('subscribed'))
    <p id="newsletter" class="px-4 py-2 shadow-xl bg-green-500 text-white rounded">
        Howdy partner! <br>
        You are now subscribed and will hear from us soon.
    </p>
@else
    <form
        action="{{ action(\App\Http\Front\Controllers\SubscribeToEmailListController::class) }}#newsletter"
        method="post"
        accept-charset="utf-8"
        id="newsletter"
        class="grid rounded-sm shadow-xl mb-4 | sm:cols-1fr-auto"
    >
        @csrf
        @honeypot
        <input type="email" id="email" name="email" placeholder="Your e-mail address" class="flex-1 h-12 px-4 bg-white rounded-t-sm placeholder-gray-300 border border-r-0 border-transparent focus:border-blue-400 | sm:rounded-tr-none sm:rounded-l-sm" aria-label="E-mail" required>
        <input type="submit" name="submit" id="submit" value="Keep me posted" class="h-12 px-6 bg-blue-800 rounded-t-none rounded-b-sm font-semibold text-white hover:bg-blue-700 | sm:rounded-bl-none sm:rounded-r-sm">
    </form>
    @error('email')
        <p class="px-4 py-2 bg-red-500 text-white text-xs rounded">
            Shoot! {{ $message }}
        </p>
    @else
        <p class="text-light-500 text-xs">
            Subscribe for course updates and extra content, nothing else.
        </p>
    @enderror

@endif
