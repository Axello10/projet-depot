<?php

namespace Database\Factories;

use App\Models\Estock;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 2),
            'deposit_id' => $this->faker->numberBetween(1, 2),
            'user_id' => $this->faker->numberBetween(1, 2),
            'quantity' => $this->faker->numberBetween(100, 300)
        ];
    }
}
