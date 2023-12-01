<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FirmFactory extends Factory
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
            'firm_name' => $this->generateCompany(),
            'city' => $this->faker->city,
            'address' => $this->generateAddress()
        ];
    }
}
