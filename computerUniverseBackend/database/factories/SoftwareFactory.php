<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SoftwareFactory extends Factory
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
            'device_id' => $this->faker->ean8(),
            'system' => $this->generateSystem(),
            'version' => $this->faker->numerify('#.##.#'),
            'driver' => $this->faker->numerify('DR#####'),
        ];
    }
}
