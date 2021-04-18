<?php

namespace Tests\Feature;

use App\Models\Layanan;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageLayananTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_layanan_list_in_layanan_index_page()
    {
        $layanan = Layanan::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('layanans.index');
        $this->see($layanan->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Layanan 1 title',
            'description' => 'Layanan 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_layanan()
    {
        $this->loginAsUser();
        $this->visitRoute('layanans.index');

        $this->click(__('layanan.create'));
        $this->seeRouteIs('layanans.create');

        $this->submitForm(__('layanan.create'), $this->getCreateFields());

        $this->seeRouteIs('layanans.show', Layanan::first());

        $this->seeInDatabase('layanans', $this->getCreateFields());
    }

    /** @test */
    public function validate_layanan_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('layanans.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_layanan_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('layanans.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_layanan_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('layanans.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Layanan 1 title',
            'description' => 'Layanan 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_layanan()
    {
        $this->loginAsUser();
        $layanan = Layanan::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('layanans.show', $layanan);
        $this->click('edit-layanan-'.$layanan->id);
        $this->seeRouteIs('layanans.edit', $layanan);

        $this->submitForm(__('layanan.update'), $this->getEditFields());

        $this->seeRouteIs('layanans.show', $layanan);

        $this->seeInDatabase('layanans', $this->getEditFields([
            'id' => $layanan->id,
        ]));
    }

    /** @test */
    public function validate_layanan_title_update_is_required()
    {
        $this->loginAsUser();
        $layanan = Layanan::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('layanans.update', $layanan), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_layanan_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $layanan = Layanan::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('layanans.update', $layanan), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_layanan_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $layanan = Layanan::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('layanans.update', $layanan), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_layanan()
    {
        $this->loginAsUser();
        $layanan = Layanan::factory()->create();
        Layanan::factory()->create();

        $this->visitRoute('layanans.edit', $layanan);
        $this->click('del-layanan-'.$layanan->id);
        $this->seeRouteIs('layanans.edit', [$layanan, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('layanans', [
            'id' => $layanan->id,
        ]);
    }
}
