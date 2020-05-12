<?php

namespace App\Http\App\Controllers;

use App\Http\App\Controllers\Licenses\BuyVideoCourseController;

class AfterPaddleSaleController
{
    public function __invoke()
    {
        sleep(3);

        session()->flash('made-purchase');

        return redirect()->action(BuyVideoCourseController::class);
    }
}
