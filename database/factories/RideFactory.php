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
        $session_day = $this->faker->randomElement(['morning', 'afternoon', 'all_day']);
        $sector = $this->faker->randomElement(['Bojaca', 'Samaria', 'Fagua']); 
        return [
            //
            'user' => rand(1,5),
            'car' => rand(1,5),
            'number' => $this->faker->unique()->numerify('##'),
            'school' => rand(1,3),
            'sector' => $sector,
            'session' => $session_day,
        ];
    }
}
