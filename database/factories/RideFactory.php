<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user' => rand(1,5),
            'car' => rand(1,5),
            'number' => $this->faker->unique()->numerify('##'),

        ];
    }
}
