<div class="flex-none z-20 w-full sm:w-1/4">
    <input type="checkbox" class="hidden docs-sidebar-toggle" id="docs-sidebar-toggle">
    <div class="flex justify-end h-0 z-10 docs-sidebar-button">
        <label class="cursor-pointer ml-auto sm:hidden"
            for="docs-sidebar-toggle">
            <span class="docs-sidebar-button-show button px-0 text-center rounded-full w-10 h-10 bg-transparent text-blue-500"><i class="fas fa-bars"></i></span>
            <span class="docs-sidebar-button-hide button px-0 text-center rounded-full w-10 h-10 bg-transparent text-gray-500"><i class="fas fa-times"></i></span>
        </label>
    </div>
    <div class="docs-sidebar">
        <ul class="docs-menu sm:px-6">
            @foreach ($chapters as $chapter)
                <li>
                    <h2 class="leading-tight">{{ $chapter->title }}</h2>
                    <ul>
                        @forelse ($chapter->videos as $video)
                            <li class="{{ isset($currentVideo) && $currentVideo->id === $video->id ? "active" : "" }}">
                                <a
                                   href="{{ route('video-course.show', [$chapter, $video]) }}"
                                >
                                    @if($video->hasBeenCompletedByCurrentUser())
                                        <span title="completed" class="absolute top-0 left-0 -ml-12 sm:-ml-6 z-0 inline-flex items-center justify-center bg-white text-green-500 rounded-r-full w-4 h-4 text-sm">
                                        &check;
                                        </span>
                                    @endif
                                    <span class="z-10">{{ $video->title }}</span>
                                </a>
                            </li>
                        @empty
                            <li>No videos yet! Stay tuned...</li>
                        @endforelse
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>

