<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_a_user()
    {
        $activity = Activity::factory()->create();

        $this->assertInstanceOf(User::class, $activity->user);
    }

    public function test_can_get_a_users_name()
    {
        $activity = Activity::factory()->create();

        $this->assertEquals($activity->user->name, $activity->getUserName());
    }

    public function test_can_get_created_at()
    {
        $activity = Activity::factory()->create([
            'created_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $activity->getCreatedAt());
    }

    public function test_can_get_updated_at()
    {
        $activity = Activity::factory()->create([
            'updated_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $activity->getUpdatedAt());
    }
}
