<?php

namespace Database\Factories;

use App\Models\Status;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(2300),
            'price' => $this->faker->numberBetween(300, 600),
            'status_id' => $this->faker->randomElement(Status::all()->pluck('id'))
        ];
    }
}
