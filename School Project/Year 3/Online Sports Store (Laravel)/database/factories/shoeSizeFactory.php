<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class shoeSizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'US8' => random_int(0, 100),
            'US9' => random_int(0, 100),
            'US10' => random_int(0, 100),
            'US11' => random_int(0, 100),
            'US12' => random_int(0, 100),
            'product_id' => $this->sequence(17),
        ];
    }
}
