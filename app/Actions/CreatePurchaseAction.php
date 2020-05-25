<?php

namespace App\Actions;

use App\Models\Purchase;
use App\Models\User;
use App\Support\Paddle\PaddleCheckoutResponse;

class CreatePurchaseAction
{
    public function execute(
        User $user,
        PaddleCheckoutResponse $paddleCheckoutResponse
    ): Purchase {
        return Purchase::create([
            'user_id' => $user->id,
            'paddle_order_id' => $paddleCheckoutResponse->orderId(),
            'product_id' => $paddleCheckoutResponse->product()->id,
            'paddle_product_id' => $paddleCheckoutResponse->paddleProductId(),
            'receipt_url' => $paddleCheckoutResponse->receiptUrl(),
            'total' => $paddleCheckoutResponse->total(),
            'paddle_response' => $paddleCheckoutResponse->toArray(),
            'paddle_checkout_id' => $paddleCheckoutResponse->paddleCheckoutId(),
        ]);
    }
}
