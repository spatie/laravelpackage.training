<?php

namespace App\Support\Paddle;

use App\Models\Product;
use Illuminate\Support\Arr;

class PaddleCheckoutResponse
{
    private array $checkoutResponse;

    public function __construct(array $checkoutResponse)
    {
        $this->checkoutResponse = $checkoutResponse;
    }

    public function isOk(): bool
    {
        if (Arr::get($this->checkoutResponse, 'success') === false) {
            return false;
        }

        if (! $this->product()) {
            return false;
        }

        if (Arr::get($this->checkoutResponse, 'order.total') === '0.00') {
            return true;
        }

        if (Arr::get($this->checkoutResponse, 'order.status') === 'incomplete') {
            return 'false';
        }

        return false;
    }

    public function product(): ?Product
    {
        $productId = Arr::get($this->checkoutResponse, 'lockers.0.product_id');

        return Product::firstWhere('paddle_product_id', $productId);
    }

    public function paddleProductId(): string
    {
        return Arr::get($this->checkoutResponse, 'lockers.0.product_id');
    }

    public function total(): int
    {
        $rawTotal =  Arr::get($this->checkoutResponse, "order.total");

        return (int)($rawTotal * 100);
    }

    public function receiptUrl(): string
    {
        return Arr::get($this->checkoutResponse, "order.receipt_url");
    }

    public function orderId(): string
    {
        return Arr::get($this->checkoutResponse, 'order.order_id');
    }

    public function toArray(): array
    {
        return $this->checkoutResponse;
    }
}
