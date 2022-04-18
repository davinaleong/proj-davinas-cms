<?php

namespace Database\Factories;

use App\Models\Post;
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
        $text = '';
        for ($i = 0; $i < 5; $i++) {
            $text .= '<p>' . $this->faker->paragraph(5, true) . '</p>';
        }

        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $name,
            'slug' => Post::generateSlug($name),
            'title' => $this->faker->sentence(10, true),
            'subtitle' => $this->faker->sentence(5, true),
            'summary' => Post::generateSummary($text),
            'text' => $text,
            'featured' => $this->faker->boolean(),
            'meta_title' => $this->faker->sentence(5, true),
            'meta_description' => $this->faker->paragraph(3),
            'published_at' => now()->format('Y-m-d'),
        ];
    }
}
