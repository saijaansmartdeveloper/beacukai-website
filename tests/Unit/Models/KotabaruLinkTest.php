<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\KotabaruLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class KotabaruLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_kotabaru_link_has_title_link_attribute()
    {
        $kotabaruLink = KotabaruLink::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $kotabaruLink->title, 'type' => __('kotabaru_link.kotabaru_link'),
        ]);
        $link = '<a href="'.route('kotabaru_links.show', $kotabaruLink).'"';
        $link .= ' title="'.$title.'">';
        $link .= $kotabaruLink->title;
        $link .= '</a>';

        $this->assertEquals($link, $kotabaruLink->title_link);
    }

    /** @test */
    public function a_kotabaru_link_has_belongs_to_creator_relation()
    {
        $kotabaruLink = KotabaruLink::factory()->make();

        $this->assertInstanceOf(User::class, $kotabaruLink->creator);
        $this->assertEquals($kotabaruLink->creator_id, $kotabaruLink->creator->id);
    }
}
