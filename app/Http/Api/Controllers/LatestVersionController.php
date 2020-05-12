<?php

namespace App\Http\Api\Controllers;

use App\Support\Satis\Satis;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Cache;

class LatestVersionController
{
    public function __invoke(Satis $satis)
    {
        return Cache::remember('mailcoach-latest-version-in-satis', CarbonInterval::day(1)->totalSeconds, function () use ($satis) {
            return response()->json($satis->getPackageData('laravel-mailcoach'));
        });
    }
}
