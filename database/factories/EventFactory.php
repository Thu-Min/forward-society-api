<?php

namespace Database\Factories;

use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $description = $this->faker->realText(500);
        $statuses = ['upcoming', 'ongoing', 'finished'];

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'excerpt' => Str::words($description, 50, '...'),
            'description' => $description,
            'instructor' => $this->faker->name(),
            'thumbnail' => $this->faker->imageUrl(),
            'event_category_id' => EventCategory::factory(),
            'status' => $statuses[rand(0,2)],
            'start_date' => $this->faker->dateTimeThisMonth(),
            'end_date' => $this->faker->dateTimeThisMonth('+ 12 days'),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
        ];
    }
}
