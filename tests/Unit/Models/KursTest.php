<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Kurs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class KursTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_kurs_has_title_link_attribute()
    {
        $kurs = Kurs::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $kurs->title, 'type' => __('kurs.kurs'),
        ]);
        $link = '<a href="'.route('kurs.show', $kurs).'"';
        $link .= ' title="'.$title.'">';
        $link .= $kurs->title;
        $link .= '</a>';

        $this->assertEquals($link, $kurs->title_link);
    }

    /** @test */
    public function a_kurs_has_belongs_to_creator_relation()
    {
        $kurs = Kurs::factory()->make();

        $this->assertInstanceOf(User::class, $kurs->creator);
        $this->assertEquals($kurs->creator_id, $kurs->creator->id);
    }
}
