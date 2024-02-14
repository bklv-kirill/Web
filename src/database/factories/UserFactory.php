<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "login" => $this->faker->name,
            "email" => $this->faker->email,
            "password" => $this->faker->password,
            "is_active" => $this->faker->boolean,
            "role_id" => $this->faker->randomElement([2, 3]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
