<?php

namespace Database\Factories;

use App\Models\DepotEmptie;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepotEmptieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepotEmptie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deposit_id' => $this->faker->numberBetween(1, 10),
            'emptie_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
