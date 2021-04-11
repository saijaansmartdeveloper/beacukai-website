<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_has_title_link_attribute()
    {
        $post = Post::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $post->title, 'type' => __('post.post'),
        ]);
        $link = '<a href="'.route('posts.show', $post).'"';
        $link .= ' title="'.$title.'">';
        $link .= $post->title;
        $link .= '</a>';

        $this->assertEquals($link, $post->title_link);
    }

    /** @test */
    public function a_post_has_belongs_to_creator_relation()
    {
        $post = Post::factory()->make();

        $this->assertInstanceOf(User::class, $post->creator);
        $this->assertEquals($post->creator_id, $post->creator->id);
    }
}
