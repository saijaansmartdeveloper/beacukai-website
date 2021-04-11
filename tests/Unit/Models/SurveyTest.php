<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Survey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SurveyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_survey_has_title_link_attribute()
    {
        $survey = Survey::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $survey->title, 'type' => __('survey.survey'),
        ]);
        $link = '<a href="'.route('surveys.show', $survey).'"';
        $link .= ' title="'.$title.'">';
        $link .= $survey->title;
        $link .= '</a>';

        $this->assertEquals($link, $survey->title_link);
    }

    /** @test */
    public function a_survey_has_belongs_to_creator_relation()
    {
        $survey = Survey::factory()->make();

        $this->assertInstanceOf(User::class, $survey->creator);
        $this->assertEquals($survey->creator_id, $survey->creator->id);
    }
}
