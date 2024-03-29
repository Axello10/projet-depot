<?php

namespace Database\Factories;

use App\Models\DepositProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepositProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepositProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deposit_id' => $this->faker->numberBetween(1,10),
            'product_id' => $this->faker->numberBetween(1,10),
            'user_id' => $this->faker->numberBetween(1,10),
            'quantity' => $this->faker->numberBetween(40, 120)
        ];
    }
}
