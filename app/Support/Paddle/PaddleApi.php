<?php

namespace App\Support\Paddle;

use Illuminate\Support\Facades\Http;

class PaddleApi
{
    public static function getCheckout(string $checkoutId): PaddleCheckoutResponse
    {
        $response = Http::get('https://checkout.paddle.com/api/1.0/order', [
            'checkout_id' => $checkoutId,
            'vendor_id' => config('services.paddle.vendor_id'),
            'vendor_auth_code' => config('services.paddle.vendor_auth_code'),

        ]);

        return new PaddleCheckoutResponse($response->json());
    }
}
