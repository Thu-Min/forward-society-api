<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(10);
        $description = $this->faker->realText(1000);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $description,
            'excerpt' => Str::words($description, "50"),
            'category_id' => rand(1,10),
            'author_name' => $this->faker->name,
            'designer_name' => $this->faker->name,
            'image' => $this->faker->imageUrl,
        ];
    }
}
