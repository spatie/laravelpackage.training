<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    config()->set('honeypot.enabled', false);
});

it('subscribes an email address to the newsletter', function () {
    Http::fake(['spatie.be/mailcoach/subscribe/*' => Http::response()]);

    $this->post('/subscribe', ['email' => 'freek@spatie.be'])
        ->assertRedirect('/?subscribed=1');

    Http::assertSent(fn ($request) => str_starts_with($request->url(), 'https://spatie.be/mailcoach/subscribe/')
        && $request['email'] === 'freek@spatie.be'
        && $request['tags'] === 'laravelpackage-training');
});

it('requires a valid email address', function () {
    Http::fake();

    $this->post('/subscribe', ['email' => 'not-an-email'])
        ->assertRedirect('/?subscription-failed=1');

    Http::assertNothingSent();
});
