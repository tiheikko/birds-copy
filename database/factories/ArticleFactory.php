<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

use App\Models\Article;
use App\Models\Species;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bird_id' => Species::inRandomOrder()->first()->id,
            'general_info' => $this->faker->text($maxNbChars = 220),
            'appearance' => $this->faker->text($maxNbChars = 220),
            'voice_description' => $this->faker->text($maxNbChars = 220),
            'habitat' => $this->faker->text($maxNbChars = 220),
            'behavior' => $this->faker->text($maxNbChars = 220),
            'feeding' => $this->faker->text($maxNbChars = 220),
            'breeding' => $this->faker->text($maxNbChars = 220),
        ];
    }
}
