<div class="py-2 flex items-center opacity-90 hover:opacity-100">
    <a href="{{ optional(auth()->user())->homeUrl() ?? '/' }}" class="block w-10 h-10">
        <img src="/images/laravel-package-training.svg">
    </a>
    <span class="ml-4 text-xl font-bold leading-tight">
        <a href="{{ optional(auth()->user())->homeUrl() ?? '/' }}">Laravel Package Training</a>
        <span class="md:absolute top-full left-0 text-xs font-normal opacity-50">a premium video course by <a href="https://spatie.be" target="_blank" class="markup-link-invers">Spatie</a></span>
    </span>
</div>
