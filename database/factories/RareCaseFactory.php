<?php

namespace Database\Factories;

use App\Models\RareCase;
use Illuminate\Database\Eloquent\Factories\Factory;

class RareCaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RareCase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'incident' => $this->faker->paragraph,
            'justification' => $this->faker->paragraphs(1, true),
            'acteur' => $this->faker->lastName,
            'user_id' => $this->faker->numberBetween(1, 2),
            'deposit_id' => $this->faker->numberBetween(1, 2),
            'price' => $this->faker->numberBetween(10000, 30000)
        ];
    }
}
