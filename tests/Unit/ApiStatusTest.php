<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ApiStatus;

/** @group new */
class ApiStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_statuses()
    {
        $this->assertCount(2, ApiStatus::getStatuses());
    }

    public function test_messages()
    {
        $this->assertCount(1, ApiStatus::getMessages());
    }
}
