<?php

namespace Tests\Unit\Policies;

use App\Models\Kurs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class KursPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_kurs()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Kurs));
    }

    /** @test */
    public function user_can_view_kurs()
    {
        $user = $this->createUser();
        $kurs = Kurs::factory()->create();
        $this->assertTrue($user->can('view', $kurs));
    }

    /** @test */
    public function user_can_update_kurs()
    {
        $user = $this->createUser();
        $kurs = Kurs::factory()->create();
        $this->assertTrue($user->can('update', $kurs));
    }

    /** @test */
    public function user_can_delete_kurs()
    {
        $user = $this->createUser();
        $kurs = Kurs::factory()->create();
        $this->assertTrue($user->can('delete', $kurs));
    }
}
