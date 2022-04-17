<?php

namespace Tests\Unit;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_have_a_user()
    {
        $setting = Setting::factory()->create();

        $this->assertInstanceOf(User::class, $setting->user);
    }

    public function test_can_get_a_users_name()
    {
        $setting = Setting::factory()->create();

        $this->assertEquals($setting->user->name, $setting->getUserName());
    }

    public function test_can_get_created_at()
    {
        $setting = Setting::factory()->create([
            'created_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $setting->getCreatedAt());
    }

    public function test_can_get_updated_at()
    {
        $setting = Setting::factory()->create([
            'updated_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $setting->getUpdatedAt());
    }
}
