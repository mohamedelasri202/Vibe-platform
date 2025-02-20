<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\listing>
 */
class listingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(),
            'tags'        => $this->faker->words(3, true),
            'company_name' => $this->faker->company(),
            'location'    => $this->faker->city(),
            'email'       => $this->faker->unique()->safeEmail(),
            'website'     => $this->faker->url(),
            'description' => $this->faker->paragraph(), // Corrected here
        ];
    }
}
