<?php

namespace Tests\Unit\Policies;

use App\Models\Survey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SurveyPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_survey()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Survey));
    }

    /** @test */
    public function user_can_view_survey()
    {
        $user = $this->createUser();
        $survey = Survey::factory()->create();
        $this->assertTrue($user->can('view', $survey));
    }

    /** @test */
    public function user_can_update_survey()
    {
        $user = $this->createUser();
        $survey = Survey::factory()->create();
        $this->assertTrue($user->can('update', $survey));
    }

    /** @test */
    public function user_can_delete_survey()
    {
        $user = $this->createUser();
        $survey = Survey::factory()->create();
        $this->assertTrue($user->can('delete', $survey));
    }
}
