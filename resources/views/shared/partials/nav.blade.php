<nav>
    <ul class="nav">
        @guest
            <a href="{{ route('login') }}">Login</a>
            <li>
                <a class="button block" href="{{ config('settings.buy_url') }}">
                    Buy course
                </a>
            </li>
        @endguest

        @auth
            @if(! auth()->user()->canAccessVideos())
                <x-navigation-item :href="config('settings.buy_url')">Buy course</x-navigation-item>
            @endif

            @if(auth()->user()->canAccessVideos())
                <x-navigation-item :href="route('video-course')">Videos</x-navigation-item>
            @endif

            <li>
                <a href="{{ route('account') }}">
                    <i title="{{ Auth::user()->name }}" class="fas fa-user"></i>
                </a>
            </li>

            <li>
                <x-form-button :action="route('logout')">
                    <i title="Log out" class="fas fa-power-off hover:text-red-500"></i>
                </x-form-button>
            </li>

            @if(auth()->user()->admin)
                <x-navigation-item href="/mailcoach">
                    <i title="Mailcoach" class="fas fa-horse text-orange-500"></i>
                </x-navigation-item>
            @endif
        @endauth
    </ul>
</nav>
