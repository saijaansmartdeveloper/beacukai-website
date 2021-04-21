<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Footer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FooterFactory extends Factory
{
    protected $model = Footer::class;

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
