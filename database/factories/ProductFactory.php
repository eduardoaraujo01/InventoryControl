<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use App\Models\User;
use App\Models\UnitOfMeasurement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random();

        return [
            'name'=> $this->faker->text(15),
            'description'=> $this->faker->text(60),
            'bar_code'=> $this->faker->numberBetween(10000, 99999),
            'price'=> $this->faker->randomFloat(2,5,99),
            'cost'=>$this->faker->randomFloat(2,5,99),
            'user_id'=> $user,
            'provider_id' => Provider::all()->random(),
            'category_id' => Category::all()->random(),
            'unit_of_measurement_id' => UnitOfMeasurement::all()->random()

        ];
    }
}




