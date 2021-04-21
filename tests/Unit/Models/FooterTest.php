<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Footer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class FooterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_footer_has_title_link_attribute()
    {
        $footer = Footer::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $footer->title, 'type' => __('footer.footer'),
        ]);
        $link = '<a href="'.route('footers.show', $footer).'"';
        $link .= ' title="'.$title.'">';
        $link .= $footer->title;
        $link .= '</a>';

        $this->assertEquals($link, $footer->title_link);
    }

    /** @test */
    public function a_footer_has_belongs_to_creator_relation()
    {
        $footer = Footer::factory()->make();

        $this->assertInstanceOf(User::class, $footer->creator);
        $this->assertEquals($footer->creator_id, $footer->creator->id);
    }
}
