<?php

namespace Tests\Unit\Policies;

use App\Models\Footer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class FooterPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_footer()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Footer));
    }

    /** @test */
    public function user_can_view_footer()
    {
        $user = $this->createUser();
        $footer = Footer::factory()->create();
        $this->assertTrue($user->can('view', $footer));
    }

    /** @test */
    public function user_can_update_footer()
    {
        $user = $this->createUser();
        $footer = Footer::factory()->create();
        $this->assertTrue($user->can('update', $footer));
    }

    /** @test */
    public function user_can_delete_footer()
    {
        $user = $this->createUser();
        $footer = Footer::factory()->create();
        $this->assertTrue($user->can('delete', $footer));
    }
}
