<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'price' => $this->faker->numberBetween(800, 2500),
            'lease_type' => $this->faker->randomElement(['4-month', '8-month', 'lease']),
            'pet_friendly' => $this->faker->boolean(),
            'ensuite_washroom' => $this->faker->boolean(),
            'property_type' => $this->faker->randomElement(['apartment', 'house']),
        ];
    }
}
