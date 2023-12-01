<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\Firm;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
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
            'INN' => $this->faker->ean8(),
            'firm' => Firm::factory(),
            'city' => $this->faker->city,
            'address' => $this->generateAddress(),
            'purchasing_manager' => Manager::factory()
        ];
    }
}
