<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount'=> $this->faker->numberBetween(1, 100),
            'type'=> $this->faker->text(10),
            'user_id'=>User::all()->random(),
            'product_id'=>Product::all()->random()
            //
        ];
    }
}
