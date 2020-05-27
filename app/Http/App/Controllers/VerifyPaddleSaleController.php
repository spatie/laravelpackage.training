<?php

namespace App\Http\App\Controllers;

use App\Actions\CreatePurchaseAction;
use App\Models\Purchase;
use App\Support\Paddle\PaddleApi;
use Exception;

class VerifyPaddleSaleController
{
    public function __invoke(string $paddleCheckoutId)
    {
        if ($previousPurchase = Purchase::firstWhere('paddle_checkout_id', $paddleCheckoutId)) {
            flash()->error("This checkout has already been processed...");

            return back();
        }

        try {
            $checkoutResponse = retry(5, function () use ($paddleCheckoutId) {
                $checkoutResponse = PaddleApi::getCheckout($paddleCheckoutId);

                if (!$checkoutResponse->isOk()) {
                    throw new Exception("Error processing checkout `{$paddleCheckoutId}`");
                }

                return $checkoutResponse;
            }, 1000);
        } catch (Exception $exception) {
            report($exception);

            $checkoutResponse = PaddleApi::getCheckout($paddleCheckoutId);

            ld("Error processing checkout `{$paddleCheckoutId}`", $checkoutResponse->toArray());

            flash()->error("There was a problem processing your payment. Please contact info@spatie.be mentioning this checkout id: `${paddleCheckoutId}`");

            return back();
        }

        (new CreatePurchaseAction())->execute(auth()->user(), $checkoutResponse);

        flash()->success('Thank you! You can now view the course 🍿');


        return redirect()->action([VideosController::class, 'index']);
    }
}
