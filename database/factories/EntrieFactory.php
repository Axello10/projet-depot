<?php

namespace Database\Factories;

use App\Models\Entrie;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntrieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entrie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendor_id' => $this->faker->numberBetween(1, 20),
            'product_id' => $this->faker->numberBetween(1, 20),
            'quantity' => $this->faker->numberBetween(50, 150),
            'price' => $this->faker->numberBetween(100000, 200000) * 5,
            'user_id' => $this->faker->numberBetween(1, 10),
            'empty' => $this->faker->numberBetween(50, 150),
            'deposit_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
