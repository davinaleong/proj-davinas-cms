<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** @group new */
class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_a_user()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->user);
    }

    public function test_can_get_a_users_name()
    {
        $post = Post::factory()->create();

        $this->assertEquals($post->user->name, $post->getUserName());
    }

    public function test_can_get_created_at()
    {
        $post = Post::factory()->create([
            'created_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $post->getCreatedAt());
    }

    public function test_can_get_updated_at()
    {
        $post = Post::factory()->create([
            'updated_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $post->getUpdatedAt());
    }
}
