<?php

namespace App\Http\App\Controllers;

use App\Actions\CreatePurchaseAction;
use App\Models\Purchase;
use App\Support\Paddle\PaddleApi;

class VerifyPaddleSaleController
{
    public function __invoke(string $paddleCheckoutId)
    {
        if ($previousPurchase = Purchase::firstWhere('paddle_checkout_id', $paddleCheckoutId)) {
            flash()->error("This checkout has already been processed...");

            return back();
        }

        $checkoutResponse = PaddleApi::getCheckout($paddleCheckoutId);

        if (!$checkoutResponse->isOk()) {
            ld("Error processing checkout `{$paddleCheckoutId}`", $checkoutResponse->toArray());

            flash()->error("There was a problem processing your payment. Please contact info@spatie.be mentioning this checkout id: `${paddleCheckoutId}`");

            return back();
        }

        (new CreatePurchaseAction())->execute(auth()->user(), $checkoutResponse);

        flash()->success('Thank you! You can now view the course 🍿');


        return redirect()->action([VideosController::class, 'index']);
    }
}
