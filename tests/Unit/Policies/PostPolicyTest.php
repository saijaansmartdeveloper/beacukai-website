<?php

namespace Tests\Unit\Policies;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PostPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_post()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Post));
    }

    /** @test */
    public function user_can_view_post()
    {
        $user = $this->createUser();
        $post = Post::factory()->create();
        $this->assertTrue($user->can('view', $post));
    }

    /** @test */
    public function user_can_update_post()
    {
        $user = $this->createUser();
        $post = Post::factory()->create();
        $this->assertTrue($user->can('update', $post));
    }

    /** @test */
    public function user_can_delete_post()
    {
        $user = $this->createUser();
        $post = Post::factory()->create();
        $this->assertTrue($user->can('delete', $post));
    }
}
