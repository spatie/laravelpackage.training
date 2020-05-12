<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Mix;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
        DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->swap(Mix::class, function () {
            return '';
        });
    }

    protected function authenticate()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);
    }
}
