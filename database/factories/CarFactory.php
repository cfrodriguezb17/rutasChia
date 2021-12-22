<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
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
            /*$table->string('brand');
            $table->string('model_of_brand');
            $table->string('year');
            $table->string('plate');
            $table->string('company');*/
            'user' => rand(1,5),
            'brand' => $this->faker->jobTitle(),
            'mob' => $this->faker->streetName(),
            'year' => $this->faker->year(),
            'plate' => $this->faker->state(),
            'company' => $this->faker->citySuffix(),
        ];
    }
}
