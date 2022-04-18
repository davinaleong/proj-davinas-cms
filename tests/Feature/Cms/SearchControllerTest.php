<?php

namespace Tests\Feature\Cms;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_make_search_request()
    {
        $this->post('/cms/search')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_make_search_request()
    {
        $search_term = 'Site';
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/cms/search', [
                'term' => $search_term
            ])
            ->assertStatus(302)
            ->assertRedirect('/cms/search/results?term=' . $search_term);
    }

    public function test_guest_gets_redirected_from_results()
    {
        $search_term = 'Site';

        $this->get('/cms/search/results?term=' . $search_term)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_admin_can_access_results()
    {
        $search_term = 'Site';
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/cms/search/results?term=' . $search_term)
            ->assertOk(302);
    }
}
