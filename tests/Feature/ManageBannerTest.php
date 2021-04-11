<?php

namespace Tests\Feature;

use App\Models\Banner;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageBannerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_banner_list_in_banner_index_page()
    {
        $banner = Banner::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('banners.index');
        $this->see($banner->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Banner 1 title',
            'description' => 'Banner 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_banner()
    {
        $this->loginAsUser();
        $this->visitRoute('banners.index');

        $this->click(__('banner.create'));
        $this->seeRouteIs('banners.create');

        $this->submitForm(__('banner.create'), $this->getCreateFields());

        $this->seeRouteIs('banners.show', Banner::first());

        $this->seeInDatabase('banners', $this->getCreateFields());
    }

    /** @test */
    public function validate_banner_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('banners.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_banner_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('banners.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_banner_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('banners.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Banner 1 title',
            'description' => 'Banner 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_banner()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('banners.show', $banner);
        $this->click('edit-banner-'.$banner->id);
        $this->seeRouteIs('banners.edit', $banner);

        $this->submitForm(__('banner.update'), $this->getEditFields());

        $this->seeRouteIs('banners.show', $banner);

        $this->seeInDatabase('banners', $this->getEditFields([
            'id' => $banner->id,
        ]));
    }

    /** @test */
    public function validate_banner_title_update_is_required()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('banners.update', $banner), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_banner_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('banners.update', $banner), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_banner_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('banners.update', $banner), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_banner()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create();
        Banner::factory()->create();

        $this->visitRoute('banners.edit', $banner);
        $this->click('del-banner-'.$banner->id);
        $this->seeRouteIs('banners.edit', [$banner, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('banners', [
            'id' => $banner->id,
        ]);
    }
}
