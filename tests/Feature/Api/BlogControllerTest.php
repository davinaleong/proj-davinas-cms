<?php

namespace Tests\Feature\Api;

use App\Models\Folder;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @group new */
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

        $this->get('/api/blog/')
            ->assertOk()
            ->assertJsonStructure([
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

        $this->get('/api/blog/about/')
            ->assertOk()
            ->assertJsonStructure([
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

        $this->get('/api/blog/archive')
            ->assertOk()
            ->assertJsonStructure([
                'page',
                'featured',
                'latest',
                'folders'
            ]);
    }

    public function test_can_access_archive_list()
    {
        /*
            - archive page
            - featured post
            - latest 1 post
            - latests 20 posts by folder id
        */
        Page::factory()->create([
            'name' => 'archive'
        ]);
        $folders = Folder::factory()->count(2)->create();

        $post = null;
        foreach ($folders as $folder) {
            $posts = Post::factory()->has($folder)->count(3)->create();
            $post = $posts[0];
        }
        $post->featured = true;
        $post->save();

        $this->get('/api/blog/archive/' . $folders[0]->name)
            ->assertOk()
            ->assertJsonStructure([
                'page',
                'featured',
                'latest',
                'posts' => [
                    'data'
                ]
            ]);
    }

    public function test_can_access_post()
    {
        $post = Post::factory()->create();

        $this->get('/api/blog/posts/' . $post->slug)
            ->assertOk()
            ->assertJsonStructure([
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

        $this->get('/api/blog/contact/')
            ->assertOk()
            ->assertJsonStructure([
                'page',
                'latest'
            ]);
    }
}
