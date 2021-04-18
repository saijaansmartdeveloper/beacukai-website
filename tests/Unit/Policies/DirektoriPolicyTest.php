<?php

namespace Tests\Unit\Policies;

use App\Models\Direktori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class DirektoriPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_direktori()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Direktori));
    }

    /** @test */
    public function user_can_view_direktori()
    {
        $user = $this->createUser();
        $direktori = Direktori::factory()->create();
        $this->assertTrue($user->can('view', $direktori));
    }

    /** @test */
    public function user_can_update_direktori()
    {
        $user = $this->createUser();
        $direktori = Direktori::factory()->create();
        $this->assertTrue($user->can('update', $direktori));
    }

    /** @test */
    public function user_can_delete_direktori()
    {
        $user = $this->createUser();
        $direktori = Direktori::factory()->create();
        $this->assertTrue($user->can('delete', $direktori));
    }
}
