<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Social;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SocialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_social_has_title_link_attribute()
    {
        $social = Social::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $social->title, 'type' => __('social.social'),
        ]);
        $link = '<a href="'.route('socials.show', $social).'"';
        $link .= ' title="'.$title.'">';
        $link .= $social->title;
        $link .= '</a>';

        $this->assertEquals($link, $social->title_link);
    }

    /** @test */
    public function a_social_has_belongs_to_creator_relation()
    {
        $social = Social::factory()->make();

        $this->assertInstanceOf(User::class, $social->creator);
        $this->assertEquals($social->creator_id, $social->creator->id);
    }
}
