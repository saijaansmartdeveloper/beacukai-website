<?php

namespace Tests\Feature;

use App\Models\Page;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_page_list_in_page_index_page()
    {
        $page = Page::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('pages.index');
        $this->see($page->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Page 1 title',
            'description' => 'Page 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_page()
    {
        $this->loginAsUser();
        $this->visitRoute('pages.index');

        $this->click(__('page.create'));
        $this->seeRouteIs('pages.create');

        $this->submitForm(__('page.create'), $this->getCreateFields());

        $this->seeRouteIs('pages.show', Page::first());

        $this->seeInDatabase('pages', $this->getCreateFields());
    }

    /** @test */
    public function validate_page_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('pages.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_page_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('pages.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_page_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('pages.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Page 1 title',
            'description' => 'Page 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_page()
    {
        $this->loginAsUser();
        $page = Page::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('pages.show', $page);
        $this->click('edit-page-'.$page->id);
        $this->seeRouteIs('pages.edit', $page);

        $this->submitForm(__('page.update'), $this->getEditFields());

        $this->seeRouteIs('pages.show', $page);

        $this->seeInDatabase('pages', $this->getEditFields([
            'id' => $page->id,
        ]));
    }

    /** @test */
    public function validate_page_title_update_is_required()
    {
        $this->loginAsUser();
        $page = Page::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('pages.update', $page), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_page_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $page = Page::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('pages.update', $page), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_page_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $page = Page::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('pages.update', $page), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_page()
    {
        $this->loginAsUser();
        $page = Page::factory()->create();
        Page::factory()->create();

        $this->visitRoute('pages.edit', $page);
        $this->click('del-page-'.$page->id);
        $this->seeRouteIs('pages.edit', [$page, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('pages', [
            'id' => $page->id,
        ]);
    }
}
