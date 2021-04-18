<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Direktori;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class DirektoriTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_direktori_has_title_link_attribute()
    {
        $direktori = Direktori::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $direktori->title, 'type' => __('direktori.direktori'),
        ]);
        $link = '<a href="'.route('direktoris.show', $direktori).'"';
        $link .= ' title="'.$title.'">';
        $link .= $direktori->title;
        $link .= '</a>';

        $this->assertEquals($link, $direktori->title_link);
    }

    /** @test */
    public function a_direktori_has_belongs_to_creator_relation()
    {
        $direktori = Direktori::factory()->make();

        $this->assertInstanceOf(User::class, $direktori->creator);
        $this->assertEquals($direktori->creator_id, $direktori->creator->id);
    }
}
