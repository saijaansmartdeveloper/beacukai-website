<?php

namespace Tests\Feature;

use App\Models\Siring;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSiringTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_siring_list_in_siring_index_page()
    {
        $siring = Siring::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('sirings.index');
        $this->see($siring->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Siring 1 title',
            'description' => 'Siring 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_siring()
    {
        $this->loginAsUser();
        $this->visitRoute('sirings.index');

        $this->click(__('siring.create'));
        $this->seeRouteIs('sirings.create');

        $this->submitForm(__('siring.create'), $this->getCreateFields());

        $this->seeRouteIs('sirings.show', Siring::first());

        $this->seeInDatabase('sirings', $this->getCreateFields());
    }

    /** @test */
    public function validate_siring_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('sirings.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_siring_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('sirings.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_siring_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('sirings.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Siring 1 title',
            'description' => 'Siring 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_siring()
    {
        $this->loginAsUser();
        $siring = Siring::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('sirings.show', $siring);
        $this->click('edit-siring-'.$siring->id);
        $this->seeRouteIs('sirings.edit', $siring);

        $this->submitForm(__('siring.update'), $this->getEditFields());

        $this->seeRouteIs('sirings.show', $siring);

        $this->seeInDatabase('sirings', $this->getEditFields([
            'id' => $siring->id,
        ]));
    }

    /** @test */
    public function validate_siring_title_update_is_required()
    {
        $this->loginAsUser();
        $siring = Siring::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('sirings.update', $siring), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_siring_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $siring = Siring::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('sirings.update', $siring), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_siring_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $siring = Siring::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('sirings.update', $siring), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_siring()
    {
        $this->loginAsUser();
        $siring = Siring::factory()->create();
        Siring::factory()->create();

        $this->visitRoute('sirings.edit', $siring);
        $this->click('del-siring-'.$siring->id);
        $this->seeRouteIs('sirings.edit', [$siring, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('sirings', [
            'id' => $siring->id,
        ]);
    }
}
