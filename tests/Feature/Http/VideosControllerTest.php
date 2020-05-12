<?php

namespace Tests\Feature\Http;

use App\Http\App\Controllers\Videos\VideosController;
use App\Models\Product;
use App\Models\User;
use App\Models\Video;
use App\Support\Vimeo\Vimeo;
use Tests\Factories\UserFactory;
use Tests\TestCase;

class VideosControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $vimeo = $this->mock(Vimeo::class);
        $vimeo->shouldReceive('getVideos')->andReturn([]);
        $vimeo->shouldReceive('getVideo')->andReturn([]);
    }

    /** @test */
    public function it_can_list_videos()
    {
        $user = (new UserFactory())
            ->withPurchase(Product::TYPE_STANDARD)
            ->create();

        $video = factory(Video::class)->create();

        $this
            ->actingAs($user)
            ->get(action([VideosController::class, 'index']))
            ->assertSuccessful()
            ->assertViewHas(['chapters'])
            ->assertSee($video->title)
            ->assertSee($video->chapter->title);
    }

    /** @test */
    public function it_can_show_videos()
    {
        $user = (new UserFactory())
            ->withPurchase(Product::TYPE_STANDARD)
            ->create();

        /** @var \App\Models\Video $video */
        $video = factory(Video::class)->create();

        $this->actingAs($user)->get(action([VideosController::class, 'show'], [$video->chapter, $video]))
            ->assertSuccessful()
            ->assertViewHas(['currentVideo', 'previousVideo', 'nextVideo', 'chapters'])
            ->assertSee($video->title)
            ->assertSee($video->chapter->title)
            ->assertSee($video->getDownloadHdUrlAttribute())
            ->assertSee($video->getDownloadSdUrlAttribute())
            ->assertSee($video->getUrlAttribute());
    }

    /** @test */
    public function it_doesnt_show_videos_for_guests()
    {
        $this->withExceptionHandling();

        $video = factory(Video::class)->create();

        $this->get(action([VideosController::class, 'index']))
            ->assertRedirect('/login');

        $this->get(action([VideosController::class, 'show'], [$video->chapter, $video]))
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_doesnt_show_videos_if_it_has_no_license()
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();

        $video = factory(Video::class)->create();

        $this->actingAs($user)->get(action([VideosController::class, 'index']))
            ->assertUnauthorized();

        $this->actingAs($user)->get(action([VideosController::class, 'show'], [$video->chapter, $video]))
            ->assertUnauthorized();
    }
}
