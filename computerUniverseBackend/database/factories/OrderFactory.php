<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    use CustomFaker;

    public function definition()
    {
        $this->setFakerInstance($this->faker);

        return [
            'order_date' => $this->faker->dateTimeBetween('-4 week', '+4 week'),
            'operator' => Staff::factory(),
            'status' => $this->generateStatus(),
            'delivery_time' => $this->faker->randomDigitNot(0),
            'sum' => 0
        ];
    }
}
