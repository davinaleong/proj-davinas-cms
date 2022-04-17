<?php

namespace Tests\Feature\Cms;

use App\Models\Activity;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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

    public function test_guest_cannot_store_settings()
    {
        $this->get('cms/settings')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function test_user_can_store_settings()
    {
        $user = User::factory()->create();
        $settings = Setting::factory(3)->make();
        $activity = Activity::factory()->make([
            'message' => 'Settings modified.',
            'label' => 'View Settings',
            'link' => route('settings.index')
        ]);

        $names = [];
        $keys = [];
        $values = [];

        foreach ($settings as $setting) {
            $names[] = $setting->name;
            $keys[] = $setting->key;
            $values[] = $setting->value;
        }

        $response = $this->actingAs($user)
            ->post('cms/settings', [
                'names' => $names,
                'keys' => $keys,
                'values' => $values,
            ]);

        $response->assertStatus(302);
        $response->with('message', 'Settings modified.');

        foreach ($settings as $setting) {
            $this->assertDatabaseHas('settings', [
                'user_id' => $user->id,
                'name' => $setting->name,
                'key' => $setting->key,
                'value' => $setting->value
            ]);
        }

        $this->assertDatabaseHas('activities', [
            'user_id' => $user->id,
            'message' => $activity->message,
            'label' => $activity->label,
            'link' => $activity->link,
        ]);
    }

    public function test_store_settings_validation()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('cms/settings', [
                'names' => [],
                'keys' => [],
                'values' => [],
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'names',
            'keys',
            'values',
        ]);
    }
}
