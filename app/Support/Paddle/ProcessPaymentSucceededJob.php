<?php

namespace App\Support\Paddle;

use App\Actions\CreatePurchaseAction;
use App\Exceptions\CouldNotHandlePaymentSucceeded;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Spatie\WebhookClient\ProcessWebhookJob;

class ProcessPaymentSucceededJob extends ProcessWebhookJob
{
    public function handle()
    {
        $paddlePayload = new PaddlePayload($this->webhookCall);

        if ($paddlePayload->alert_name !== 'payment_succeeded') {
            return;
        }

        if (Purchase::where('paddle_alert_id', $paddlePayload->alert_id)->first()) {
            return;
        }

        if (!$user = User::where('email', $paddlePayload->email)->first()) {
            throw CouldNotHandlePaymentSucceeded::userNotFound($this->webhookCall);
        };

        if (!$product = Product::where('paddle_product_id', $paddlePayload->product_id)->first()) {
            throw CouldNotHandlePaymentSucceeded::productNotFound($this->webhookCall);
        }

        if ($product->type === Product::TYPE_VIDEOS) {
            (new CreatePurchaseAction)->execute($user, $product, $paddlePayload);

            return;
        }
    }
}
