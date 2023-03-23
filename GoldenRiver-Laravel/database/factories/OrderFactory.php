<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Order::class;

    public function definition()
    {
        $faker = Faker::create();
        return [

        'Order_Status' => 'Basket',
        'Order_Total_Price' => $faker->randomFloat(2, 10, 100),
        ];
    }
}
