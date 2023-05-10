<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->randomDigit(5),
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
