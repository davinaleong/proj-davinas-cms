<?php

namespace Tests\Feature\Cms;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @group new */
class SettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_gets_redirected_from_index()
    {
        $this->get('cms/settings')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_index()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('cms/settings')
            ->assertOk();
    }

    public function test_guest_gets_redirected_from_edit()
    {
        $this->get('cms/settings/edit')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_access_edit()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('cms/settings/edit')
            ->assertOk();
    }
}
