<?php

namespace Tests\Feature\Cms;

use App\Models\Activity;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @group new */
class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_gets_redirected_from_index()
    {
        $this->get('cms/posts')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_index()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('cms/posts')
            ->assertOk();
    }

    public function test_guest_gets_redirected_from_create()
    {
        $this->get('cms/posts/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_create()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('cms/posts/create')
            ->assertOk();
    }

    public function test_guest_cannot_store_a_post()
    {
        $this->post('cms/posts')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_store_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->make();
        $activity = Activity::factory()->for($user)->make([
            'message' => 'Post ' . $post->name . ' created.',
            'label' => 'View Post',
            'link' => route('posts.show', ['post' => 1])
        ]);

        $response = $this->actingAs($user)
            ->post('cms/posts', [
                'name' => $post->name,
                'title' => $post->title,
                'subtitle' => $post->subtitle,
                'text' => $post->text,
                'featured' => $post->featured,
                'meta_title' => $post->meta_title,
                'meta_description' => $post->meta_description,
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('cms/posts/1');
        $response->assertSessionHas('message', 'post created.');

        $this->assertDatabaseHas('posts', [
            'user_id' => $user->id,
            'name' => $post->name,
            'slug' => $post->slug,
            'title' => $post->title,
            'subtitle' => $post->subtitle,
            'text' => $post->text,
            'featured' => (int) $post->featured,
            'meta_title' => $post->meta_title,
            'meta_description' => $post->meta_description,
            'published_at' => $post->published_at,
        ]);

        $this->assertDatabaseHas('activities', [
            'user_id' => $user->id,
            'message' => $activity->message,
            'label' => $activity->label,
            'link' => $activity->link,
        ]);
    }

    public function test_store_post_validation()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('cms/posts');

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name', 'title', 'subtitle',
            'text', 'featured', 'meta_title', 'meta_description', 'published_at'
        ]);
    }

    public function test_guest_gets_redirected_from_show()
    {
        $post = Post::factory()->create();
        $this->get('cms/posts/' . $post->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_show()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $this->actingAs($user)
            ->get('cms/posts/' . $post->id)
            ->assertOk();
    }

    public function test_user_accessing_non_existant_post_returns_error()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('cms/posts/1')
            ->assertNotFound();
    }

    public function test_guest_cannot_update_a_post()
    {
        $post = Post::factory()->create();

        $this->patch('cms/posts/' . $post->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_update_a_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->create();
        $edited_post = Post::factory()->for($user)->make();

        $activity = Activity::factory()->for($user)->make([
            'message' => 'Post ' . $edited_post->name . ' modified.',
            'label' => 'View Post',
            'link' => route('posts.show', ['post' => $post])
        ]);

        $response = $this->actingAs($user)
            ->patch('cms/posts/' . $post->id, [
                'name' => $edited_post->name,
                'title' => $edited_post->title,
                'subtitle' => $edited_post->subtitle,
                'text' => $edited_post->text,
                'featured' => $edited_post->featured,
                'meta_title' => $edited_post->meta_title,
                'meta_description' => $edited_post->meta_description,
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('cms/posts/' . $post->id);
        $response->assertSessionHas('message', 'Post modified.');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'user_id' => $user->id,
            'name' => $edited_post->name,
            'slug' => $edited_post->slug,
            'title' => $edited_post->title,
            'subtitle' => $edited_post->subtitle,
            'subtitle' => $edited_post->subtitle,
            'featured' => (int) $edited_post->featured,
            'meta_title' => $edited_post->meta_title,
            'meta_description' => $edited_post->meta_description,
        ]);

        $this->assertDatabaseHas('activities', [
            'user_id' => $user->id,
            'message' => $activity->message,
            'label' => $activity->label,
            'link' => $activity->link,
        ]);
    }

    public function test_update_post_validation()
    {
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->create();

        $response = $this->actingAs($user)
            ->patch('cms/posts/' . $post->id);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name', 'title', 'subtitle',
            'text', 'featured', 'meta_title', 'meta_description', 'published_at'
        ]);
    }

    public function test_guest_cannot_destroy_a_post()
    {
        $post = Post::factory()->create();

        $this->delete('cms/posts/' . $post->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_destroy_a_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $activity = Activity::factory()->for($user)->make([
            'message' => 'Post ' . $post->name . ' deleted.'
        ]);

        $response = $this->actingAs($user)
            ->delete('cms/posts/' . $post->id);

        $response->assertStatus(302);
        $response->assertRedirect('cms/posts');
        $response->assertSessionHas('message', 'Post deleted.');

        $this->assertSoftDeleted('posts', [
            'id' => $post->id
        ]);

        $this->assertDatabaseHas('activities', [
            'user_id' => $user->id,
            'message' => $activity->message
        ]);
    }
}
