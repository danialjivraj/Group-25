<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'Address_Status' => 'Default',
            'ZIP' => $this->faker->postcode,
            'City' => $this->faker->city,
            'Country' => $this->faker->country,
            'Street' => $this->faker->streetAddress,
            'County' => $this->randomElement(['Midlands', 'Hillingdon']),
        ];
    }
}
