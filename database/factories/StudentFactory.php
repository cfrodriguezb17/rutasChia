<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $type_document = $this->faker->randomElement(['CC', 'CE', 'TI']);
        $name_user1 = $this->faker->firstName($gender);
        $name_user2 = $this->faker->firstName($gender);
        $surname_user1 = $this->faker->lastName($gender);
        $surname_user2 = $this->faker->lastName($gender);
        $education = $this->faker->randomElement(['preescolar', 'primaria', 'bachillerato']);
        $grade = $this->faker->randomElement(['preescolar', 'primero', 'segundo', 'tercero', 'cuarto', 'quinto', 'sexto', 'séptimo', 'octavo', 'noveno', 'décimo', 'once']);
        $course = $this->faker->randomElement(['101', '201', '301', '401', '501', '601', '701', '801', '901', '1001', '1101']);
        $session_day = $this->faker->randomElement(['morning', 'afternoon', 'all_day']);
        return [
            'names' => $name_user1 . ' ' . $name_user2,
            'surnames' => $surname_user1 . ' ' . $surname_user2,
            'type_id' => $type_document,
            'dni' => $this->faker->unique()->numerify('##########'),
            'birth_date' => $this->faker->dateTimeThisDecade->format('Y-m-d'),
            'gender' => $gender, 
            'grade' => $grade,
            'course' => $course,
            'education' => $education,
            'session' => $session_day,
            'school' => rand(1,3),
            'user' => rand(1,5),
            'ride' => rand(1,5),
            'address' => $this->faker->address(),
            'image' => 'students/default.jpg'
        ];
    }
}
