<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $type_document = $this->faker->randomElement(['CC', 'CE', 'TI']);
        $type_user = $this->faker->randomElement(['driver', 'organizer', 'tutor', 'manager']);
        $name_user1 = $this->faker->firstName($gender);
        $name_user2 = $this->faker->firstName($gender);
        $surname_user1 = $this->faker->lastName($gender);
        $surname_user2 = $this->faker->lastName($gender);
        return [
            'names' => $name_user1 . ' ' . $name_user2,
            'surnames' => $surname_user1 . ' ' . $surname_user2,
            'type_id' => $type_document,
            'dni' => $this->faker->unique()->numerify('##########'),
            'birth_date' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'gender' => $gender, 
            'phone' => $this->faker->numerify('31########'),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'type_user' => $type_user,
            'address' => $this->faker->address(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
