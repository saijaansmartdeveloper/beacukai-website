<?php

namespace Tests\Feature;

use App\Models\Direktori;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDirektoriTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_direktori_list_in_direktori_index_page()
    {
        $direktori = Direktori::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('direktoris.index');
        $this->see($direktori->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Direktori 1 title',
            'description' => 'Direktori 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_direktori()
    {
        $this->loginAsUser();
        $this->visitRoute('direktoris.index');

        $this->click(__('direktori.create'));
        $this->seeRouteIs('direktoris.create');

        $this->submitForm(__('direktori.create'), $this->getCreateFields());

        $this->seeRouteIs('direktoris.show', Direktori::first());

        $this->seeInDatabase('direktoris', $this->getCreateFields());
    }

    /** @test */
    public function validate_direktori_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('direktoris.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_direktori_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('direktoris.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_direktori_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('direktoris.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Direktori 1 title',
            'description' => 'Direktori 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_direktori()
    {
        $this->loginAsUser();
        $direktori = Direktori::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('direktoris.show', $direktori);
        $this->click('edit-direktori-'.$direktori->id);
        $this->seeRouteIs('direktoris.edit', $direktori);

        $this->submitForm(__('direktori.update'), $this->getEditFields());

        $this->seeRouteIs('direktoris.show', $direktori);

        $this->seeInDatabase('direktoris', $this->getEditFields([
            'id' => $direktori->id,
        ]));
    }

    /** @test */
    public function validate_direktori_title_update_is_required()
    {
        $this->loginAsUser();
        $direktori = Direktori::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('direktoris.update', $direktori), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_direktori_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $direktori = Direktori::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('direktoris.update', $direktori), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_direktori_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $direktori = Direktori::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('direktoris.update', $direktori), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_direktori()
    {
        $this->loginAsUser();
        $direktori = Direktori::factory()->create();
        Direktori::factory()->create();

        $this->visitRoute('direktoris.edit', $direktori);
        $this->click('del-direktori-'.$direktori->id);
        $this->seeRouteIs('direktoris.edit', [$direktori, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('direktoris', [
            'id' => $direktori->id,
        ]);
    }
}
