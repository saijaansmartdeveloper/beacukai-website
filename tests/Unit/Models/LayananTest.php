<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Layanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class LayananTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_layanan_has_title_link_attribute()
    {
        $layanan = Layanan::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $layanan->title, 'type' => __('layanan.layanan'),
        ]);
        $link = '<a href="'.route('layanans.show', $layanan).'"';
        $link .= ' title="'.$title.'">';
        $link .= $layanan->title;
        $link .= '</a>';

        $this->assertEquals($link, $layanan->title_link);
    }

    /** @test */
    public function a_layanan_has_belongs_to_creator_relation()
    {
        $layanan = Layanan::factory()->make();

        $this->assertInstanceOf(User::class, $layanan->creator);
        $this->assertEquals($layanan->creator_id, $layanan->creator->id);
    }
}
