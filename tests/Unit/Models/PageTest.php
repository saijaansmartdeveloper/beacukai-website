<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_page_has_title_link_attribute()
    {
        $page = Page::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $page->title, 'type' => __('page.page'),
        ]);
        $link = '<a href="'.route('pages.show', $page).'"';
        $link .= ' title="'.$title.'">';
        $link .= $page->title;
        $link .= '</a>';

        $this->assertEquals($link, $page->title_link);
    }

    /** @test */
    public function a_page_has_belongs_to_creator_relation()
    {
        $page = Page::factory()->make();

        $this->assertInstanceOf(User::class, $page->creator);
        $this->assertEquals($page->creator_id, $page->creator->id);
    }
}
