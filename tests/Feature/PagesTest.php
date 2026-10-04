<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();
});

it('shows the home page without fetching prices on the server', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Laravel Package Training')
        ->assertSee('Buy the complete course')
        ->assertSee('x-data="spatiePrice(2)"', false)
        ->assertSee('window.spatiePrice', false)
        ->assertSee('countdown.seconds', false)
        ->assertSee('https://spatie.be/products/laravel-package-training');

    Http::assertNothingSent();
});

it('adds the referrer to spatie.be links in the browser', function () {
    $this->get('/?referrer=newsletter')
        ->assertOk()
        ->assertSee("searchParams.set('referrer', referrer)", false)
        ->assertDontSee('https://spatie.be/products/laravel-package-training?referrer=newsletter');
});

it('confirms a newsletter subscription', function () {
    $this->get('/?subscribed=1')
        ->assertOk()
        ->assertSee('We have sent you an email with a link to confirm your subscription')
        ->assertDontSee('Keep me posted');
});

it('shows that a subscription failed', function () {
    $this->get('/?subscription-failed=1')
        ->assertOk()
        ->assertSee('We could not subscribe you.')
        ->assertSee('Keep me posted');
});

it('does not show subscription messages by default', function () {
    $this->get('/')
        ->assertSee('Keep me posted')
        ->assertDontSee('We have sent you an email')
        ->assertDontSee('We could not subscribe you.');
});

it('serves robots.txt', function () {
    $this->get('/robots.txt')
        ->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
        ->assertSee('User-agent: *');
});

it('shows the static pages', function (string $url, string $text) {
    $this->get($url)->assertOk()->assertSee($text);
})->with([
    ['/login', 'spatie.be/login'],
    ['/terms-of-use', 'Terms of use'],
    ['/privacy', 'Privacy'],
]);

it('serves every page without a database connection', function () {
    collect(['/', '/login', '/terms-of-use', '/privacy', '/up'])
        ->each(fn (string $url) => $this->get($url)->assertOk());

    expect(DB::getConnections())->toBeEmpty();
});

it('serves the testimonial avatars itself', function () {
    $html = $this->get('/')->assertOk()->assertDontSee('pbs.twimg.com')->getContent();

    preg_match_all('#src="'.preg_quote(asset('images/testimonials/'), '#').'([^"]+)"#', $html, $matches);

    $avatarPaths = array_map(fn (string $avatar) => public_path("images/testimonials/{$avatar}"), $matches[1]);

    expect($avatarPaths)->toHaveCount(12)->each->toBeFile();
});
