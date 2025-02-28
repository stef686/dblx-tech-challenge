<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(rand(3, 6), true),
            'image_url' => 'https://random.imagecdn.app/250/400',
            'description' => fake()->optional()->paragraph(),
            'active' => fake()->boolean(),
        ];
    }
}
