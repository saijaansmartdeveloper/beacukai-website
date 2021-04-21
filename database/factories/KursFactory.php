<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Kurs;
use Illuminate\Database\Eloquent\Factories\Factory;

class KursFactory extends Factory
{
    protected $model = Kurs::class;

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
