<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
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
            'customer' => Manager::factory(),
            'address' => $this->generateAddress(),
            'phone' => $this->faker->phoneNumber(),
            'order_id' => Order::factory()
        ];
    }
}
