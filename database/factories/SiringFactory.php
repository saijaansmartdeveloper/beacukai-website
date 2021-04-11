<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Siring;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiringFactory extends Factory
{
    protected $model = Siring::class;

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
