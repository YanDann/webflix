<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(8),
            'avatar' => 'https://picsum.photos/id/'.rand(0, 1084).'/400/600',
            'birthday' => fake()->dateTimeBetween('-70 years', '+0 years'),
        ];
    }
}
