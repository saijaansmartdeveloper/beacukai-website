<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Testimoni;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TestimoniTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_testimoni_has_title_link_attribute()
    {
        $testimoni = Testimoni::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $testimoni->title, 'type' => __('testimoni.testimoni'),
        ]);
        $link = '<a href="'.route('testimonis.show', $testimoni).'"';
        $link .= ' title="'.$title.'">';
        $link .= $testimoni->title;
        $link .= '</a>';

        $this->assertEquals($link, $testimoni->title_link);
    }

    /** @test */
    public function a_testimoni_has_belongs_to_creator_relation()
    {
        $testimoni = Testimoni::factory()->make();

        $this->assertInstanceOf(User::class, $testimoni->creator);
        $this->assertEquals($testimoni->creator_id, $testimoni->creator->id);
    }
}
