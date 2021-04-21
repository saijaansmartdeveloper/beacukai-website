<?php

namespace Tests\Feature;

use App\Models\Footer;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageFooterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_footer_list_in_footer_index_page()
    {
        $footer = Footer::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('footers.index');
        $this->see($footer->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Footer 1 title',
            'description' => 'Footer 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_footer()
    {
        $this->loginAsUser();
        $this->visitRoute('footers.index');

        $this->click(__('footer.create'));
        $this->seeRouteIs('footers.create');

        $this->submitForm(__('footer.create'), $this->getCreateFields());

        $this->seeRouteIs('footers.show', Footer::first());

        $this->seeInDatabase('footers', $this->getCreateFields());
    }

    /** @test */
    public function validate_footer_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('footers.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_footer_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('footers.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_footer_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('footers.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Footer 1 title',
            'description' => 'Footer 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_footer()
    {
        $this->loginAsUser();
        $footer = Footer::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('footers.show', $footer);
        $this->click('edit-footer-'.$footer->id);
        $this->seeRouteIs('footers.edit', $footer);

        $this->submitForm(__('footer.update'), $this->getEditFields());

        $this->seeRouteIs('footers.show', $footer);

        $this->seeInDatabase('footers', $this->getEditFields([
            'id' => $footer->id,
        ]));
    }

    /** @test */
    public function validate_footer_title_update_is_required()
    {
        $this->loginAsUser();
        $footer = Footer::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('footers.update', $footer), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_footer_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $footer = Footer::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('footers.update', $footer), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_footer_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $footer = Footer::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('footers.update', $footer), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_footer()
    {
        $this->loginAsUser();
        $footer = Footer::factory()->create();
        Footer::factory()->create();

        $this->visitRoute('footers.edit', $footer);
        $this->click('del-footer-'.$footer->id);
        $this->seeRouteIs('footers.edit', [$footer, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('footers', [
            'id' => $footer->id,
        ]);
    }
}
