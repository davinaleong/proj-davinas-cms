<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id' => \App\Models\User::factory(),
            'user_id' => 1,
            'message' => $this->faker->sentence(10),
            'label' => '',
            'link' => ''
        ];
    }
}
