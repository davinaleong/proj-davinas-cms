<?php

namespace Tests\Feature\Api\Blog;

use App\Models\Folder;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_access_index()
    {
        Page::factory()->create([
            'name' => 'index'
        ]);
        $posts = Post::factory()->count(6)->create();

        $posts[0]->featured = true;
        $posts[0]->save();

        $response = $this->get('/api/blog/');
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'page',
            'featured',
            'latest'
        ]);
    }

    public function test_can_access_about()
    {
        Page::factory()->create([
            'name' => 'about'
        ]);
        Post::factory()->create([
            'featured' => true
        ]);

        $response = $this->get('/api/blog/about/');
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'page',
            'latest'
        ]);
    }

    public function test_can_access_archive_folder()
    {
        Page::factory()->create([
            'name' => 'archive'
        ]);
        Folder::factory()->count(4)->create();
        Post::factory()->create([
            'featured' => true
        ]);

        $response = $this->get('/api/blog/archive-folder');
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'page',
            'featured',
            'latest',
            'folders'
        ]);
    }

    public function test_can_access_archive_list()
    {
        Page::factory()->create([
            'name' => 'archive'
        ]);

        $posts = Post::factory()->has(Folder::factory())->count(3)->create();
        $post = $posts[0];
        $post->featured = true;
        $post->save();

        $response = $this->get('/api/blog/archive-list/' . $post->getFolderName());
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'page',
            'featured',
            'folders',
            'latest',
            'posts'
        ]);
    }

    public function test_can_access_post()
    {
        $post = Post::factory()->create();

        $response = $this->get('/api/blog/posts/' . $post->slug);
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'latest',
            'posts'
        ]);
    }

    public function test_can_access_contact()
    {
        Page::factory()->create([
            'name' => 'contact'
        ]);
        Post::factory()->create([
            'featured' => true
        ]);

        $response = $this->get('/api/blog/contact/');
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'page',
            'latest'
        ]);
    }
}
