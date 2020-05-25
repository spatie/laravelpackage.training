<?php

namespace Tests\Models;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Video;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_check_if_it_has_a_valid_video_purchase()
    {
        /** @var \App\Models\User $user */
        $user = factory(User::class)->create();

        $this->assertFalse($user->canAccessVideos());

        factory(Purchase::class)->create([
            'user_id' => $user->id,
            'product_id' => factory(Product::class)->create(['type' => Product::TYPE_VIDEOS])->id,
        ]);

        $this->assertTrue($user->canAccessVideos());
    }

    /** @test */
    public function it_can_see_if_it_has_completed_a_video()
    {
        /** @var \App\Models\User $user */
        $user = factory(User::class)->create();
        $video = factory(Video::class)->create();

        $this->assertFalse($user->hasCompletedVideo($video));

        $user->completedVideos()->attach($video);

        $this->assertTrue($user->fresh()->hasCompletedVideo($video));
    }
}
