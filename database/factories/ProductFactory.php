<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->domainName,
            'price_in' => $this->faker->numberBetween(25000, 100000),
            'price_out' => $this->faker->numberBetween(25000, 100000),
            'second_price_in' => $this->faker->numberBetween(25000, 100000),
            'second_price_out' => $this->faker->numberBetween(25000, 100000),
            'user_id' => $this->faker->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(1, 150)
        ];
    }
}
