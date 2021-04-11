<?php

namespace Tests\Feature;

use App\Models\Testimoni;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTestimoniTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_testimoni_list_in_testimoni_index_page()
    {
        $testimoni = Testimoni::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('testimonis.index');
        $this->see($testimoni->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Testimoni 1 title',
            'description' => 'Testimoni 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_testimoni()
    {
        $this->loginAsUser();
        $this->visitRoute('testimonis.index');

        $this->click(__('testimoni.create'));
        $this->seeRouteIs('testimonis.create');

        $this->submitForm(__('testimoni.create'), $this->getCreateFields());

        $this->seeRouteIs('testimonis.show', Testimoni::first());

        $this->seeInDatabase('testimonis', $this->getCreateFields());
    }

    /** @test */
    public function validate_testimoni_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('testimonis.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_testimoni_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('testimonis.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_testimoni_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('testimonis.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Testimoni 1 title',
            'description' => 'Testimoni 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_testimoni()
    {
        $this->loginAsUser();
        $testimoni = Testimoni::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('testimonis.show', $testimoni);
        $this->click('edit-testimoni-'.$testimoni->id);
        $this->seeRouteIs('testimonis.edit', $testimoni);

        $this->submitForm(__('testimoni.update'), $this->getEditFields());

        $this->seeRouteIs('testimonis.show', $testimoni);

        $this->seeInDatabase('testimonis', $this->getEditFields([
            'id' => $testimoni->id,
        ]));
    }

    /** @test */
    public function validate_testimoni_title_update_is_required()
    {
        $this->loginAsUser();
        $testimoni = Testimoni::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('testimonis.update', $testimoni), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_testimoni_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $testimoni = Testimoni::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('testimonis.update', $testimoni), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_testimoni_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $testimoni = Testimoni::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('testimonis.update', $testimoni), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_testimoni()
    {
        $this->loginAsUser();
        $testimoni = Testimoni::factory()->create();
        Testimoni::factory()->create();

        $this->visitRoute('testimonis.edit', $testimoni);
        $this->click('del-testimoni-'.$testimoni->id);
        $this->seeRouteIs('testimonis.edit', [$testimoni, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('testimonis', [
            'id' => $testimoni->id,
        ]);
    }
}
