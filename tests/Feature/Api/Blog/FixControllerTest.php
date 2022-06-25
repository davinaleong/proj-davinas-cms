<?php

namespace Tests\Feature\Blog;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Folder;

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
        $result = DB::table('posts')
            ->select(DB::raw('YEAR(`published_at`) AS `year`'), DB::raw('COUNT(*) AS `post_count`'))
            ->groupBy(DB::raw('YEAR(`published_at`)'))
            ->orderByDesc(DB::raw('YEAR(`published_at`)'))
            ->get();
        
        $response = $this->post('api/blog/fix/folders');
        $response->assertOk();
        $response->assertJson([
            'status' => 'SUCCESS',
            'message' => 'Folders fixed.'
        ]);

        $this->assertEquals(count($result), Folder::count());
    }
}
