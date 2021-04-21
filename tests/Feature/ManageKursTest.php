<?php

namespace Tests\Feature;

use App\Models\Kurs;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageKursTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_kurs_list_in_kurs_index_page()
    {
        $kurs = Kurs::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('kurs.index');
        $this->see($kurs->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Kurs 1 title',
            'description' => 'Kurs 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_kurs()
    {
        $this->loginAsUser();
        $this->visitRoute('kurs.index');

        $this->click(__('kurs.create'));
        $this->seeRouteIs('kurs.create');

        $this->submitForm(__('kurs.create'), $this->getCreateFields());

        $this->seeRouteIs('kurs.show', Kurs::first());

        $this->seeInDatabase('kurs', $this->getCreateFields());
    }

    /** @test */
    public function validate_kurs_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('kurs.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kurs_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('kurs.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kurs_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('kurs.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Kurs 1 title',
            'description' => 'Kurs 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_kurs()
    {
        $this->loginAsUser();
        $kurs = Kurs::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('kurs.show', $kurs);
        $this->click('edit-kurs-'.$kurs->id);
        $this->seeRouteIs('kurs.edit', $kurs);

        $this->submitForm(__('kurs.update'), $this->getEditFields());

        $this->seeRouteIs('kurs.show', $kurs);

        $this->seeInDatabase('kurs', $this->getEditFields([
            'id' => $kurs->id,
        ]));
    }

    /** @test */
    public function validate_kurs_title_update_is_required()
    {
        $this->loginAsUser();
        $kurs = Kurs::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('kurs.update', $kurs), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kurs_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $kurs = Kurs::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('kurs.update', $kurs), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_kurs_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $kurs = Kurs::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('kurs.update', $kurs), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_kurs()
    {
        $this->loginAsUser();
        $kurs = Kurs::factory()->create();
        Kurs::factory()->create();

        $this->visitRoute('kurs.edit', $kurs);
        $this->click('del-kurs-'.$kurs->id);
        $this->seeRouteIs('kurs.edit', [$kurs, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('kurs', [
            'id' => $kurs->id,
        ]);
    }
}
