<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id'       => $this->faker->numberBetween(1, 100),
            'name'          => $this->faker->city(),
            'address'       => $this->faker->address(),
            'description'   => $this->faker->realText(200),
            'day'           => $this->faker->numberBetween(1, 2),
        ];
    }
}
