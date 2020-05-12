<?php

namespace App\Http\App\Controllers\Licenses;

use App\Models\Product;

class BuyVideoCourseController
{
    public function __invoke()
    {
        $videosProduct = Product::where('type', Product::TYPE_VIDEOS)->first();

        return view('app.buy.index', compact(
            'videosProduct',
        ));
    }
}
