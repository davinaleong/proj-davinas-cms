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
        /*
            - index page
            - featured post
            - latest 6 posts
        */
        Page::factory()->create([
            'name' => 'Index'
        ]);
        $posts = Post::factory()->count(6)->create();

        $posts[0]->featured = true;
        $posts[0]->save();

        $this->get('/api/blog/')
            ->assertOk()
            ->assertJson([
                'page',
                'featured',
                'latest'
            ]);
    }

    public function test_can_access_about()
    {
        /*
            - about page
            - latest 1 post
        */
        Page::factory()->create([
            'name' => 'About'
        ]);
        Post::factory()->create([
            'featured' => true
        ]);

        $this->get('/api/blog/about/')
            ->assertOk()
            ->assertJson([
                'page',
                'latest'
            ]);
    }

    public function test_can_access_archive_folder()
    {
        /*
            - archive page
            - featured post
            - latest 1 post
            - all folders
        */
        Page::factory()->create([
            'name' => 'Archive'
        ]);
        Folder::factory()->count(4)->create();
        Post::factory()->create([
            'featured' => true
        ]);

        $this->get('/api/blog/archive')
            ->assertOk()
            ->assertJson([
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
            'name' => 'Archive'
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
            ->assertJson([
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
        /*
            - latest 1 post
            - post by slug
        */
        $post = Post::factory()->create();

        $this->get('/api/blog/posts/' . $post->slug)
            ->assertOk()
            ->assertJson([
                'latest',
                'posts'
            ]);
    }

    public function test_can_access_contact()
    {
        /*
            - contact page
            - latest 1 post
        */
        Page::factory()->create([
            'name' => 'Contact'
        ]);
        Post::factory()->create([
            'featured' => true
        ]);

        $this->get('/api/blog/contact/')
            ->assertOk()
            ->assertJson([
                'page',
                'latest'
            ]);
    }
}
