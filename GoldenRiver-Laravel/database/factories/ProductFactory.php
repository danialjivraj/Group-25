<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Product::class;

    public function definition()
    {
        $faker = Faker::create();
        return [
        'Category_ID' => $faker->numberBetween(6, 9),
        'Product_Name' => $faker->word,
        'Product_Discount' => $faker->numberBetween(0, 50),
        'Product_Price' => $faker->randomFloat(2, 10, 100),
        'Product_ID' => $faker->unique()->numberBetween(45, 1000),
        'Amount' => $faker->numberBetween(0, 100),
        'Description' => $faker->paragraph,
        ];
    }
}
