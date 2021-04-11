<?php

namespace Tests\Feature;

use App\Models\Social;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSocialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_social_list_in_social_index_page()
    {
        $social = Social::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('socials.index');
        $this->see($social->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Social 1 title',
            'description' => 'Social 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_social()
    {
        $this->loginAsUser();
        $this->visitRoute('socials.index');

        $this->click(__('social.create'));
        $this->seeRouteIs('socials.create');

        $this->submitForm(__('social.create'), $this->getCreateFields());

        $this->seeRouteIs('socials.show', Social::first());

        $this->seeInDatabase('socials', $this->getCreateFields());
    }

    /** @test */
    public function validate_social_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('socials.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_social_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('socials.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_social_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('socials.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Social 1 title',
            'description' => 'Social 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_social()
    {
        $this->loginAsUser();
        $social = Social::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('socials.show', $social);
        $this->click('edit-social-'.$social->id);
        $this->seeRouteIs('socials.edit', $social);

        $this->submitForm(__('social.update'), $this->getEditFields());

        $this->seeRouteIs('socials.show', $social);

        $this->seeInDatabase('socials', $this->getEditFields([
            'id' => $social->id,
        ]));
    }

    /** @test */
    public function validate_social_title_update_is_required()
    {
        $this->loginAsUser();
        $social = Social::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('socials.update', $social), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_social_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $social = Social::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('socials.update', $social), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_social_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $social = Social::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('socials.update', $social), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_social()
    {
        $this->loginAsUser();
        $social = Social::factory()->create();
        Social::factory()->create();

        $this->visitRoute('socials.edit', $social);
        $this->click('del-social-'.$social->id);
        $this->seeRouteIs('socials.edit', [$social, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('socials', [
            'id' => $social->id,
        ]);
    }
}
