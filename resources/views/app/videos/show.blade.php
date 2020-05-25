@extends('app.layouts.master')

@section('title', 'Videos')

@section('sidebar')
    @include('app.videos.partials.sidebar')
@endsection

@section('content')
        <div class="">
        @include('app.videos.partials.vimeo')

        <div class="w-full overflow-hidden md:flex justify-between pb-10">
            @if ($previousVideo)
                <a class="mb-2 no-underline flex items-center md:w-1/2 md:pr-4 text-sm" href="{{ $previousVideo->url }}">
                    <i class="fa fa-arrow-left text-sm opacity-50 mr-1 hidden | md:inline-block"></i>
                    <span class="markup-link truncate"><span class="font-semibold">Previous: </span> {{ $previousVideo->title }}</span>
                </a>
            @endif
            @if ($nextVideo)
                <a class="mb-2 no-underline flex items-center md:justify-end ml-auto text-sm" href="{{ $nextVideo->url }}">
                    <span class="markup-link truncate"><span class="font-semibold">Next</span>: {{ $nextVideo->title  }}</span>
                    <i class="fa fa-arrow-right text-sm opacity-50 ml-1 hidden | md:inline-block"></i>
                </a>
            @endif
        </div>

        <div class="w-full aspect-16x9 shadow-xl bg-gray-900 border-gray-300 border overflow-hidden" id="player"
                     data-video-id="{{ $currentVideo->id }}"
                     data-user-id="{{ auth()->user()->id }}"
                     data-video-title="{{ $currentVideo->title }}"
                >
                <iframe class="absolute pin w-full h-full" src="https://player.vimeo.com/video/{{ $currentVideo->vimeo_id }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media&amp;color=f9933a" allowfullscreen allowtransparency></iframe>
        </div>

        <div class="flex justify-between items-baseline">

            <h2 class="mr-4">{{ $currentVideo->title }}</h2>

            @if (! auth()->user()->hasCompletedVideo($currentVideo))
                <form action="{{ action([\App\Http\App\Controllers\Videos\VideoCompletionController::class, 'store'], $currentVideo) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="button">
                        Mark as completed
                    </button>
                </form>
            @else
                <form action="{{ action([\App\Http\App\Controllers\Videos\VideoCompletionController::class, 'store'], $currentVideo) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="button bg-green-500 hover:bg-green-600">
                        <i class="fas fa-check mr-1"></i> Completed
                    </button>
                </form>
            @endif

        </div>

        <div class="text-lg">
            {!! $currentVideo->formatted_description !!}
        </div>

@endsection
