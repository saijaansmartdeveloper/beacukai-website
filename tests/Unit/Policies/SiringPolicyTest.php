<?php

namespace Tests\Unit\Policies;

use App\Models\Siring;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SiringPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_siring()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Siring));
    }

    /** @test */
    public function user_can_view_siring()
    {
        $user = $this->createUser();
        $siring = Siring::factory()->create();
        $this->assertTrue($user->can('view', $siring));
    }

    /** @test */
    public function user_can_update_siring()
    {
        $user = $this->createUser();
        $siring = Siring::factory()->create();
        $this->assertTrue($user->can('update', $siring));
    }

    /** @test */
    public function user_can_delete_siring()
    {
        $user = $this->createUser();
        $siring = Siring::factory()->create();
        $this->assertTrue($user->can('delete', $siring));
    }
}
