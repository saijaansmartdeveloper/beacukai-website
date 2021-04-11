<?php

namespace Tests\Unit\Policies;

use App\Models\KotabaruLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class KotabaruLinkPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_kotabaru_link()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new KotabaruLink));
    }

    /** @test */
    public function user_can_view_kotabaru_link()
    {
        $user = $this->createUser();
        $kotabaruLink = KotabaruLink::factory()->create();
        $this->assertTrue($user->can('view', $kotabaruLink));
    }

    /** @test */
    public function user_can_update_kotabaru_link()
    {
        $user = $this->createUser();
        $kotabaruLink = KotabaruLink::factory()->create();
        $this->assertTrue($user->can('update', $kotabaruLink));
    }

    /** @test */
    public function user_can_delete_kotabaru_link()
    {
        $user = $this->createUser();
        $kotabaruLink = KotabaruLink::factory()->create();
        $this->assertTrue($user->can('delete', $kotabaruLink));
    }
}
