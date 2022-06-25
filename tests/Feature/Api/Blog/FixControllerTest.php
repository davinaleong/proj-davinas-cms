<?php

namespace Tests\Feature\Blog;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @group new */
class FixControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_access_fix_featured_posts()
    {
        Post::factory()->count(50)->create([
            'featured' => true
        ]);
        $this->assertTrue(Post::where('featured', true)->count() > 0);

        $response = $this->post('/api/blog/fix/posts-featured', [
            'featured' => false
        ]);
        $response->assertOk();
        $response->assertJson([
            'status' => 'SUCCESS',
            'message' => 'Featured posts fixed.'
        ]);

        $this->assertEquals(0, Post::where('featured', true)->count());
    }

    public function test_can_access_fix_folders()
    {
        Post::factory()->count(50)->create();
    }
}
