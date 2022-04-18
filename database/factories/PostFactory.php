<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
            'title' => $this->faker->sentence(10, true),
            'subtitle' => $this->faker->sentence(5, true),
            'summary' => $this->faker->sentence(5, true),
            'text' => $this->faker->paragraphs(5, true),
            'featured' => $this->faker->boolean(),
            'meta_title' => $this->faker->sentence(5, true),
            'meta_description' => $this->faker->paragraph(3),
            'published_at' => now()->format('Y-m-d H:i:s'),
        ];
    }
}
