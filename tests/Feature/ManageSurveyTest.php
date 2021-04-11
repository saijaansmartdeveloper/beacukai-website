<?php

namespace Tests\Feature;

use App\Models\Survey;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSurveyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_survey_list_in_survey_index_page()
    {
        $survey = Survey::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('surveys.index');
        $this->see($survey->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Survey 1 title',
            'description' => 'Survey 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_survey()
    {
        $this->loginAsUser();
        $this->visitRoute('surveys.index');

        $this->click(__('survey.create'));
        $this->seeRouteIs('surveys.create');

        $this->submitForm(__('survey.create'), $this->getCreateFields());

        $this->seeRouteIs('surveys.show', Survey::first());

        $this->seeInDatabase('surveys', $this->getCreateFields());
    }

    /** @test */
    public function validate_survey_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('surveys.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_survey_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('surveys.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_survey_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('surveys.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Survey 1 title',
            'description' => 'Survey 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_survey()
    {
        $this->loginAsUser();
        $survey = Survey::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('surveys.show', $survey);
        $this->click('edit-survey-'.$survey->id);
        $this->seeRouteIs('surveys.edit', $survey);

        $this->submitForm(__('survey.update'), $this->getEditFields());

        $this->seeRouteIs('surveys.show', $survey);

        $this->seeInDatabase('surveys', $this->getEditFields([
            'id' => $survey->id,
        ]));
    }

    /** @test */
    public function validate_survey_title_update_is_required()
    {
        $this->loginAsUser();
        $survey = Survey::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('surveys.update', $survey), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_survey_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $survey = Survey::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('surveys.update', $survey), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_survey_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $survey = Survey::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('surveys.update', $survey), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_survey()
    {
        $this->loginAsUser();
        $survey = Survey::factory()->create();
        Survey::factory()->create();

        $this->visitRoute('surveys.edit', $survey);
        $this->click('del-survey-'.$survey->id);
        $this->seeRouteIs('surveys.edit', [$survey, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('surveys', [
            'id' => $survey->id,
        ]);
    }
}
