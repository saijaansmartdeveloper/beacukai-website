<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Directory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectoryFactory extends Factory
{
    protected $model = Directory::class;

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
