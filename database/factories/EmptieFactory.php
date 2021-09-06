<?php

namespace Database\Factories;

use App\Models\Emptie;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmptieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Emptie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1, 20),
            'product_id' => $this->faker->numberBetween(1, 20),
            'quantity' => $this->faker->numberBetween(50, 150),
            'deposit_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
