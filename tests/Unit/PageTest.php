<?php

namespace Tests\Unit;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_a_user()
    {
        $page = Page::factory()->create();

        $this->assertInstanceOf(User::class, $page->user);
    }

    public function test_can_get_a_users_name()
    {
        $page = Page::factory()->create();

        $this->assertEquals($page->user->name, $page->getUserName());
    }

    public function test_can_get_created_at()
    {
        $page = Page::factory()->create([
            'created_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $page->getCreatedAt());
    }

    public function test_can_get_updated_at()
    {
        $page = Page::factory()->create([
            'updated_at' => '2022-04-01 12:00:00'
        ]);

        $this->assertEquals('01 Apr 2022 12:00:00', $page->getUpdatedAt());
    }
}
