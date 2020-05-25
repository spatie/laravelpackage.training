<?php

namespace Tests\Feature\Paddle;

use App\Actions\CreatePurchaseAction;
use App\Models\Product;
use App\Models\User;
use App\Support\Paddle\PaddleCheckoutResponse;
use Tests\TestCase;

class CreatePurchaseActionTest extends TestCase
{
    /** @test */
    public function it_can_create_a_purchase()
    {
        factory(Product::class)->create(['paddle_product_id' => '593300']);

        $rawResponse = $this->getJsonStubContent('paddleCheckoutPayload');

        $response = new PaddleCheckoutResponse($rawResponse);

        $user = factory(User::class)->create();

        (new CreatePurchaseAction())->execute($user, $response);

        $purchases = $user->purchases;

        $this->assertCount(1, $purchases);

        $purchase = $purchases->first();

        $this->assertEquals(123, $purchase->total);

        $this->assertEquals(593300, $purchase->paddle_product_id);
    }
}
