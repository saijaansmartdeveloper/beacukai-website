<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Direktori;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirektoriFactory extends Factory
{
    protected $model = Direktori::class;

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
