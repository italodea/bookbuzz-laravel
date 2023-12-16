<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookClub>
 */
class BookClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'photo_url' => $this->faker->url,
            'description' => $this->faker->text,
            'owner_id' => User::factory(),
            'is_private' => $this->faker->boolean,
        ];
    }
}
