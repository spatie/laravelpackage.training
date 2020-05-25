<?php

namespace App\Http\App\Controllers;

use App\Actions\CreatePurchaseAction;
use App\Http\App\Controllers\Videos\VideosController;
use App\Support\Paddle\PaddleApi;

class VerifyPaddleSaleController
{
    public function __invoke(string $paddleCheckoutId)
    {
        $checkoutResponse = PaddleApi::getCheckout($paddleCheckoutId);

        if (! $checkoutResponse->isOk()) {
            ld("Error processing checkout `{$paddleCheckoutId}`", $checkoutResponse->toArray());

            flash()->error("There was a problem processing your payment. Please contact info@spatie.be mentioning this checkout id: `${paddleCheckoutId}`");

            return back();
        }

        (new CreatePurchaseAction())->execute(auth()->user(), $checkoutResponse);

        flash()->success('You have bought the course');


        return redirect()->action(VideosController::class);
    }
}
