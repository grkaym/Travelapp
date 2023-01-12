<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => $this->faker->numberBetween(1, 31),
            'name'          => $this->faker->realtext(20),
            'description'   => $this->faker->realText(200),
            'day'           => $this->faker->numberBetween(1, 5),
            'open_flag'     => $this->faker->numberBetween(1, 1),
        ];
    }
}
