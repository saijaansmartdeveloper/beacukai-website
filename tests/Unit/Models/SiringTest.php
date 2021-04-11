<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Siring;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SiringTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_siring_has_title_link_attribute()
    {
        $siring = Siring::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $siring->title, 'type' => __('siring.siring'),
        ]);
        $link = '<a href="'.route('sirings.show', $siring).'"';
        $link .= ' title="'.$title.'">';
        $link .= $siring->title;
        $link .= '</a>';

        $this->assertEquals($link, $siring->title_link);
    }

    /** @test */
    public function a_siring_has_belongs_to_creator_relation()
    {
        $siring = Siring::factory()->make();

        $this->assertInstanceOf(User::class, $siring->creator);
        $this->assertEquals($siring->creator_id, $siring->creator->id);
    }
}
