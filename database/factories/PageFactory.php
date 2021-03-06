<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $text = '';
        for ($i = 0; $i < 5; $i++) {
            $text .= '<p>' . $this->faker->paragraph(5, true) . '</p>';
        }

        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->name(),
            'meta_title' => $this->faker->sentence(5, true),
            'meta_description' => $this->faker->paragraph(3),
            'title' => $this->faker->sentence(10, true),
            'subtitle' => $this->faker->sentence(5, true),
            'text' => $text,
        ];
    }
}
