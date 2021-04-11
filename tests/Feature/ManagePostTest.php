<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_post_list_in_post_index_page()
    {
        $post = Post::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('posts.index');
        $this->see($post->title);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Post 1 title',
            'description' => 'Post 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_post()
    {
        $this->loginAsUser();
        $this->visitRoute('posts.index');

        $this->click(__('post.create'));
        $this->seeRouteIs('posts.create');

        $this->submitForm(__('post.create'), $this->getCreateFields());

        $this->seeRouteIs('posts.show', Post::first());

        $this->seeInDatabase('posts', $this->getCreateFields());
    }

    /** @test */
    public function validate_post_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('posts.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_post_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('posts.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_post_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('posts.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'Post 1 title',
            'description' => 'Post 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_post()
    {
        $this->loginAsUser();
        $post = Post::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('posts.show', $post);
        $this->click('edit-post-'.$post->id);
        $this->seeRouteIs('posts.edit', $post);

        $this->submitForm(__('post.update'), $this->getEditFields());

        $this->seeRouteIs('posts.show', $post);

        $this->seeInDatabase('posts', $this->getEditFields([
            'id' => $post->id,
        ]));
    }

    /** @test */
    public function validate_post_title_update_is_required()
    {
        $this->loginAsUser();
        $post = Post::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('posts.update', $post), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_post_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $post = Post::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('posts.update', $post), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_post_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $post = Post::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('posts.update', $post), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_post()
    {
        $this->loginAsUser();
        $post = Post::factory()->create();
        Post::factory()->create();

        $this->visitRoute('posts.edit', $post);
        $this->click('del-post-'.$post->id);
        $this->seeRouteIs('posts.edit', [$post, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('posts', [
            'id' => $post->id,
        ]);
    }
}
