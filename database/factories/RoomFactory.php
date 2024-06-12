<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hotel;
class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'hotel_id' => function () {
                return Hotel::factory()->create()->id;
            },
            'number' => $this->faker->numberBetween(1,1000),
            'status' => 'available',
            'price' => $this->faker->randomFloat(2, 50, 500),
            'type' => 'single',
        ];
    }
}
