<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $school = $this->faker->randomElement(['Colegio Nacional Diversificado', 'Colegio Jose Joaquin Casas', 'San Josemaria Escriva de Balaguer']);
        return [
            //
            /*$table->string('name');
            $table->string('nit');
            $table->string('address');
            $table->string('phone');
            $table->string('email');*/
            'name' => $school,
            'nit' => $this->faker->randomNumber(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->numerify('31########'),
            'email' => $this->faker->unique()->safeEmail(),


        ];
    }
}
