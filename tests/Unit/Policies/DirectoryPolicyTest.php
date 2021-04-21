<?php

namespace Tests\Unit\Policies;

use App\Models\Directory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class DirectoryPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_directory()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Directory));
    }

    /** @test */
    public function user_can_view_directory()
    {
        $user = $this->createUser();
        $directory = Directory::factory()->create();
        $this->assertTrue($user->can('view', $directory));
    }

    /** @test */
    public function user_can_update_directory()
    {
        $user = $this->createUser();
        $directory = Directory::factory()->create();
        $this->assertTrue($user->can('update', $directory));
    }

    /** @test */
    public function user_can_delete_directory()
    {
        $user = $this->createUser();
        $directory = Directory::factory()->create();
        $this->assertTrue($user->can('delete', $directory));
    }
}
