<?php

namespace Tests\Feature;

use App\Models\Directory;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDirectoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_directory_list_in_directory_index_page()
    {
        $directory = Directory::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('directories.index');
        $this->see($directory->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Directory 1 title',
            'description' => 'Directory 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_directory()
    {
        $this->loginAsUser();
        $this->visitRoute('directories.index');

        $this->click(__('directory.create'));
        $this->seeRouteIs('directories.create');

        $this->submitForm(__('directory.create'), $this->getCreateFields());

        $this->seeRouteIs('directories.show', Directory::first());

        $this->seeInDatabase('directories', $this->getCreateFields());
    }

    /** @test */
    public function validate_directory_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('directories.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_directory_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('directories.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_directory_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('directories.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Directory 1 title',
            'description' => 'Directory 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_directory()
    {
        $this->loginAsUser();
        $directory = Directory::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('directories.show', $directory);
        $this->click('edit-directory-'.$directory->id);
        $this->seeRouteIs('directories.edit', $directory);

        $this->submitForm(__('directory.update'), $this->getEditFields());

        $this->seeRouteIs('directories.show', $directory);

        $this->seeInDatabase('directories', $this->getEditFields([
            'id' => $directory->id,
        ]));
    }

    /** @test */
    public function validate_directory_title_update_is_required()
    {
        $this->loginAsUser();
        $directory = Directory::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('directories.update', $directory), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_directory_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $directory = Directory::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('directories.update', $directory), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_directory_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $directory = Directory::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('directories.update', $directory), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_directory()
    {
        $this->loginAsUser();
        $directory = Directory::factory()->create();
        Directory::factory()->create();

        $this->visitRoute('directories.edit', $directory);
        $this->click('del-directory-'.$directory->id);
        $this->seeRouteIs('directories.edit', [$directory, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('directories', [
            'id' => $directory->id,
        ]);
    }
}
