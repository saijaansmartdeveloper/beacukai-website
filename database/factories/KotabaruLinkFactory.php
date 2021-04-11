<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\KotabaruLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class KotabaruLinkFactory extends Factory
{
    protected $model = KotabaruLink::class;

    public function definition()
    {
        return [
            'title'       => $this->faker->word,
            'description' => $this->faker->sentence,
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
