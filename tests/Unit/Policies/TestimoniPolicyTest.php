<?php

namespace Tests\Unit\Policies;

use App\Models\Testimoni;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TestimoniPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_testimoni()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Testimoni));
    }

    /** @test */
    public function user_can_view_testimoni()
    {
        $user = $this->createUser();
        $testimoni = Testimoni::factory()->create();
        $this->assertTrue($user->can('view', $testimoni));
    }

    /** @test */
    public function user_can_update_testimoni()
    {
        $user = $this->createUser();
        $testimoni = Testimoni::factory()->create();
        $this->assertTrue($user->can('update', $testimoni));
    }

    /** @test */
    public function user_can_delete_testimoni()
    {
        $user = $this->createUser();
        $testimoni = Testimoni::factory()->create();
        $this->assertTrue($user->can('delete', $testimoni));
    }
}
