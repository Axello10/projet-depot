<?php

namespace Database\Factories;

use App\Models\Giveback;
use Illuminate\Database\Eloquent\Factories\Factory;

class GivebackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Giveback::class;

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
            'deposit_id' => $this->faker->numberBetween(1, 10),
            'payer' => 'oui'
        ];
    }
}
