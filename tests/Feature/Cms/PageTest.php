<?php

namespace Tests\Feature\Cms;

use App\Models\Activity;
use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @group new */
class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_gets_redirected_from_index()
    {
        $this->get('cms/pages')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_index()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('cms/pages')
            ->assertOk();
    }

    public function test_guest_gets_redirected_from_create()
    {
        $this->get('cms/settings/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_create()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('cms/settings/create')
            ->assertOk();
    }

    public function test_guest_cannot_store_a_page()
    {
        $this->post('cms/pages')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_store_page()
    {
        $user = User::factory()->create();
        $page = Page::factory()->for($user)->make();
        $activity = Activity::factory()->for($user)->make([
            'message' => 'Page ' . $page->name . ' created.',
            'label' => 'View Page',
            'link' => route('pages.show', ['page' => 1])
        ]);

        $response = $this->actingAs($user)
            ->post('cms/pages', [
                'name' => $page->name,
                'meta_title' => $page->meta_title,
                'meta_description' => $page->meta_description,
                'title' => $page->title,
                'subtitle' => $page->subtitle
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('cms/pages/1');
        $response->assertSessionHas('message', 'Page created.');

        $this->assertDatabaseHas('pages', [
            'user_id' => $user_id,
            'name' => $page->name,
            'meta_title' => $page->meta_title,
            'meta_description' => $page->meta_description,
            'title' => $page->title,
            'subtitle' => $page->subtitle
        ]);

        $this->assertDatabaseHas('activities', [
            'user_id' => $user->id,
            'message' => $activity->message,
            'label' => $activity->label,
            'link' => $activity->link,
        ]);
    }

    public function test_store_page_validation()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('cms/pages');

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name', 'title', 'subtitle', 'meta_title', 'meta_description'
        ]);
    }

    public function test_guest_gets_redirected_from_show()
    {
        $page = Page::factory()->create();
        $this->get('cms/pages/' . $page->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_show()
    {
        $user = User::factory()->show();
        $page = Page::factory()->create();

        $this->actingAs($user)
            ->get('cms/pages/' . $page->id)
            ->assertOk();
    }

    public function test_user_accessing_non_existant_page_returns_error()
    {
        $user = User::factory()->show();

        $this->actingAs($user)
            ->get('cms/pages/1')
            ->assertNotFound();
    }

    public function test_guest_cannot_update_a_page()
    {
        $page = Page::factory()->create();

        $this->post('cms/pages/' . $page->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_update_page()
    {
        $user = User::factory()->create();
        $page = Page::factory()->for($user)->create();
        $edited_page = Page::factory()->for($user)->make();

        $activity = Activity::factory()->for($user)->make([
            'message' => 'Page ' . $edited_page->name . ' modified.',
            'label' => 'View Page',
            'link' => route('pages.show', ['page' => $page])
        ]);

        $response = $this->actingAs($user)
            ->patch('cms/pages/' . $page->id, [
                'name' => $edited_page->name,
                'meta_title' => $edited_page->meta_title,
                'meta_description' => $edited_page->meta_description,
                'title' => $edited_page->title,
                'subtitle' => $edited_page->subtitle
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('cms/pages/' . $page->id);
        $response->assertSessionHas('message', 'Page created.');

        $this->assertDatabaseHas('pages', [
            'id' => $page->id,
            'user_id' => $user_id,
            'name' => $edited_page->name,
            'meta_title' => $edited_page->meta_title,
            'meta_description' => $edited_page->meta_description,
            'title' => $edited_page->title,
            'subtitle' => $edited_page->subtitle
        ]);

        $this->assertDatabaseHas('activities', [
            'user_id' => $user->id,
            'message' => $activity->message,
            'label' => $activity->label,
            'link' => $activity->link,
        ]);
    }

    public function test_update_page_validation()
    {
        $user = User::factory()->create();
        $page = Page::factory()->for($user)->create();

        $response = $this->actingAs($user)
            ->patch('cms/pages/' . $page->id);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name', 'title', 'subtitle', 'meta_title', 'meta_description'
        ]);
    }

    public function test_guest_cannot_destroy_a_page()
    {
        $page = Page::factory()->create();

        $this->delete('cms/pages/' . $page->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_destroy_a_page()
    {
        $user = User::factory()->create();
        $page = Page::factory()->create();
        $activity = Activity::factory()->for($user)->make([
            'message' => 'Page ' . $page->name . ' deleted.'
        ]);

        $response = $this->actingAs($user)
            ->delete('cms/pages/' . $page->id);

        $response->assertStatus(302);
        $response->assertRedirect('cms/pages');

        $this->assertSoftDeleted('pages', [
            'id' => $page->id
        ]);

        $this->assertDatabaseHas('activities', [
            'user_id' => $user->id,
            'message' => $activity->message
        ]);
    }
}
