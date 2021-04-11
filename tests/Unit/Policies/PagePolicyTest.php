<?php

namespace Tests\Unit\Policies;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PagePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_page()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Page));
    }

    /** @test */
    public function user_can_view_page()
    {
        $user = $this->createUser();
        $page = Page::factory()->create();
        $this->assertTrue($user->can('view', $page));
    }

    /** @test */
    public function user_can_update_page()
    {
        $user = $this->createUser();
        $page = Page::factory()->create();
        $this->assertTrue($user->can('update', $page));
    }

    /** @test */
    public function user_can_delete_page()
    {
        $user = $this->createUser();
        $page = Page::factory()->create();
        $this->assertTrue($user->can('delete', $page));
    }
}
