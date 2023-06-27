<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10),
            'description' => $this->faker->sentence,
            'surface' => $this->faker->numberBetween(0,1544),
            'rooms' => $this->faker->numberBetween(0,10),
            'bedrooms' => $this->faker->numberBetween(0,154),
            'floor' => $this->faker->numberBetween(0,15),
            'price' => $this->faker->numberBetween(0,17777),
            'city' => $this->faker->text(17),
            'address' => $this->faker->address,
            'postal_code' => $this->faker->text(15),
            'sold' => $this->faker->boolean
        ];
    }
}
