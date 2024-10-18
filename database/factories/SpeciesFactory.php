<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\Family;
use App\Models\Order;
use App\Models\Genus;
use App\Models\Species;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Species>
 */
class SpeciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'latin_name' => $this->faker->word(),
            'order_id' => Order::inRandomOrder()->first()->id,
            'genus_id' => Genus::inRandomOrder()->first()->id,
            'family_id' => Family::inRandomOrder()->first()->id,
            'rare' => $this->faker->randomElement([0, 1]),
            'red_list' => $this->faker->randomElement([0, 1]),
        ];
    }
}
