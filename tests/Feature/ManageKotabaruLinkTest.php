<?php

namespace Tests\Feature;

use App\Models\KotabaruLink;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageKotabaruLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_kotabaru_link_list_in_kotabaru_link_index_page()
    {
        $kotabaruLink = KotabaruLink::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('kotabaru_links.index');
        $this->see($kotabaruLink->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'KotabaruLink 1 title',
            'description' => 'KotabaruLink 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_kotabaru_link()
    {
        $this->loginAsUser();
        $this->visitRoute('kotabaru_links.index');

        $this->click(__('kotabaru_link.create'));
        $this->seeRouteIs('kotabaru_links.create');

        $this->submitForm(__('kotabaru_link.create'), $this->getCreateFields());

        $this->seeRouteIs('kotabaru_links.show', KotabaruLink::first());

        $this->seeInDatabase('kotabaru_links', $this->getCreateFields());
    }

    /** @test */
    public function validate_kotabaru_link_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('kotabaru_links.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kotabaru_link_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('kotabaru_links.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kotabaru_link_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('kotabaru_links.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'KotabaruLink 1 title',
            'description' => 'KotabaruLink 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_kotabaru_link()
    {
        $this->loginAsUser();
        $kotabaruLink = KotabaruLink::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('kotabaru_links.show', $kotabaruLink);
        $this->click('edit-kotabaru_link-'.$kotabaruLink->id);
        $this->seeRouteIs('kotabaru_links.edit', $kotabaruLink);

        $this->submitForm(__('kotabaru_link.update'), $this->getEditFields());

        $this->seeRouteIs('kotabaru_links.show', $kotabaruLink);

        $this->seeInDatabase('kotabaru_links', $this->getEditFields([
            'id' => $kotabaruLink->id,
        ]));
    }

    /** @test */
    public function validate_kotabaru_link_title_update_is_required()
    {
        $this->loginAsUser();
        $kotabaru_link = KotabaruLink::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('kotabaru_links.update', $kotabaru_link), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kotabaru_link_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $kotabaru_link = KotabaruLink::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('kotabaru_links.update', $kotabaru_link), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kotabaru_link_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $kotabaru_link = KotabaruLink::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('kotabaru_links.update', $kotabaru_link), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_kotabaru_link()
    {
        $this->loginAsUser();
        $kotabaruLink = KotabaruLink::factory()->create();
        KotabaruLink::factory()->create();

        $this->visitRoute('kotabaru_links.edit', $kotabaruLink);
        $this->click('del-kotabaru_link-'.$kotabaruLink->id);
        $this->seeRouteIs('kotabaru_links.edit', [$kotabaruLink, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('kotabaru_links', [
            'id' => $kotabaruLink->id,
        ]);
    }
}
