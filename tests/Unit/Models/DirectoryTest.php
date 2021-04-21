<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Directory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class DirectoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_directory_has_title_link_attribute()
    {
        $directory = Directory::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $directory->title, 'type' => __('directory.directory'),
        ]);
        $link = '<a href="'.route('directories.show', $directory).'"';
        $link .= ' title="'.$title.'">';
        $link .= $directory->title;
        $link .= '</a>';

        $this->assertEquals($link, $directory->title_link);
    }

    /** @test */
    public function a_directory_has_belongs_to_creator_relation()
    {
        $directory = Directory::factory()->make();

        $this->assertInstanceOf(User::class, $directory->creator);
        $this->assertEquals($directory->creator_id, $directory->creator->id);
    }
}
