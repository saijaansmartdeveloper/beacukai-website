<?php

namespace Tests\Unit\Policies;

use App\Models\Layanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class LayananPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_layanan()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Layanan));
    }

    /** @test */
    public function user_can_view_layanan()
    {
        $user = $this->createUser();
        $layanan = Layanan::factory()->create();
        $this->assertTrue($user->can('view', $layanan));
    }

    /** @test */
    public function user_can_update_layanan()
    {
        $user = $this->createUser();
        $layanan = Layanan::factory()->create();
        $this->assertTrue($user->can('update', $layanan));
    }

    /** @test */
    public function user_can_delete_layanan()
    {
        $user = $this->createUser();
        $layanan = Layanan::factory()->create();
        $this->assertTrue($user->can('delete', $layanan));
    }
}
