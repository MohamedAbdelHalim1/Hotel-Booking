<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hotel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Hotel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'city' => $this->faker->city,
            'stars' => 5,
        ];
    }
}
