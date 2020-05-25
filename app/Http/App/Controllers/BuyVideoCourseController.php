<?php

namespace App\Http\App\Controllers;

use App\Http\App\Controllers\Videos\VideosController;
use App\Models\Product;

class BuyVideoCourseController
{
    public function __invoke()
    {
        if (auth()->user()->canAccessVideos()) {
            return redirect()->action([VideosController::class, 'index']);
        }

        $videosProduct = Product::where('type', Product::TYPE_VIDEOS)->first();

        return view('app.buy.index', compact(
            'videosProduct',
        ));
    }
}
