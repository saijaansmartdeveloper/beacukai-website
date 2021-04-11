<?php

namespace Tests\Unit\Policies;

use App\Models\Social;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SocialPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_social()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Social));
    }

    /** @test */
    public function user_can_view_social()
    {
        $user = $this->createUser();
        $social = Social::factory()->create();
        $this->assertTrue($user->can('view', $social));
    }

    /** @test */
    public function user_can_update_social()
    {
        $user = $this->createUser();
        $social = Social::factory()->create();
        $this->assertTrue($user->can('update', $social));
    }

    /** @test */
    public function user_can_delete_social()
    {
        $user = $this->createUser();
        $social = Social::factory()->create();
        $this->assertTrue($user->can('delete', $social));
    }
}
