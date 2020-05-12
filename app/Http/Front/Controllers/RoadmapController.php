<?php

namespace App\Http\Front\Controllers;

use Illuminate\Support\Facades\Http;

class RoadmapController
{
    public function __invoke()
    {
        $changelog = cache()->remember('changelog', now()->addHour(), function () {
            $response = Http::withBasicAuth(config('services.github.username'), config('services.github.token'))
                ->get('https://api.github.com/repos/spatie/laravel-mailcoach/contents/CHANGELOG.md')
                ->json();
            $changelog = base64_decode($response['content']);
            return str_replace("\nAll notable changes to `laravel-mailcoach` will be documented in this file\n", "", $changelog);
        });

        return view('front.roadmap.index', compact('changelog'));
    }
}
