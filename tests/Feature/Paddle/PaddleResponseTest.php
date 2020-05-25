<?php

namespace Tests\Feature\Paddle;

use App\Support\Paddle\PaddleCheckoutResponse;
use Tests\TestCase;

class PaddleResponseTest extends TestCase
{
    /** @test */
    public function it_can_get_the_general_properties()
    {
        $rawResponse = $this->getJsonStubContent('paddleCheckoutPayload');

        $response = new PaddleCheckoutResponse($rawResponse);

        $this->assertEquals('57225611-chre608565465d9-144d5af02b', $response->paddleCheckoutId());

        $this->assertEquals(123, $response->total());
        $this->assertEquals('https://my.paddle.com/receipt/14892750/57225611-chre608565465d9-144d5af02b', $response->receiptUrl());
    }
}
