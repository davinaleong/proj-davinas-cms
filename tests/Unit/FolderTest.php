<?php

namespace Tests\Feature;

use App\Models\Folder;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FolderTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_many_posts()
    {
        $folder = Folder::factory()
            ->has(Post::factory()->count(3), 'posts')
            ->create();

        $this->assertInstanceOf(Post::class, $folder->posts[0]);
    }

    public function test_can_get_created_at()
    {
        $folder = Folder::factory()->create([
            'created_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $folder->getCreatedAt());
    }

    public function test_can_get_updated_at()
    {
        $folder = Folder::factory()->create([
            'updated_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $folder->getUpdatedAt());
    }
}
