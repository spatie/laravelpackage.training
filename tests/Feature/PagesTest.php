<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();
});

function fakePriceApi(bool $discountActive = false): void
{
    Http::fake([
        'spatie.be/api/price/*' => Http::response([
            'actual' => ['price_in_cents' => 9730, 'currency_code' => 'EUR', 'currency_symbol' => '€', 'formatted_price' => '€ 97.30'],
            'without_discount' => ['price_in_cents' => 13900, 'currency_code' => 'EUR', 'currency_symbol' => '€', 'formatted_price' => '€ 139'],
            'discount' => ['active' => $discountActive, 'percentage' => 30, 'name' => 'BLACK FRIDAY', 'expires_at' => now()->addDays(3)->timestamp],
        ]),
    ]);
}

it('shows the home page with the price', function () {
    fakePriceApi();

    $this->get('/')
        ->assertOk()
        ->assertSee('Laravel Package Training')
        ->assertSee('Buy the complete course')
        ->assertSee('97.30')
        ->assertDontSee('ending in');
});

it('shows a countdown when a discount is active', function () {
    fakePriceApi(discountActive: true);

    $this->get('/')
        ->assertOk()
        ->assertSee('BLACK FRIDAY ending in')
        ->assertSee('timer.days', false);
});

it('shows the home page when the price cannot be fetched', function () {
    Http::fake(['spatie.be/api/price/*' => Http::response(status: 500)]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Buy the complete course');
});

it('remembers the referrer in the buy links', function () {
    fakePriceApi();

    $this->get('/?referrer=newsletter')
        ->assertOk()
        ->assertSee('https://spatie.be/products/laravel-package-training?referrer=newsletter');
});

it('shows the static pages', function (string $url, string $text) {
    $this->get($url)->assertOk()->assertSee($text);
})->with([
    ['/login', 'spatie.be/login'],
    ['/terms-of-use', 'Terms of use'],
    ['/privacy', 'Privacy'],
]);
