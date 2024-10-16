<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Species;
use App\Models\Image;
use App\Models\Article;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n = 15;
        for ($i = 0; $i < $n; $i++) {
            Order::create([
                'name' => Str::random(10),
                'latin_name' => Str::random(10),
            ]);

            Family::create([
                'name' => Str::random(10),
                'latin_name' => Str::random(10),
                'order_id' => Order::inRandomOrder()->first()->id,
            ]);

            Genus::create([
                'name' => Str::random(10),
                'latin_name' => Str::random(10),
                'order_id' => Order::inRandomOrder()->first()->id,
                'family_id' => Family::inRandomOrder()->first()->id,
            ]);

            Species::create([
                'name' => Str::random(10),
                'latin_name' => Str::random(10),
                'order_id' => Order::inRandomOrder()->first()->id,
                'family_id' => Family::inRandomOrder()->first()->id,
                'genus_id' => Genus::inRandomOrder()->first()->id,
                'rare' => random_int(0, 1),
                'red_list' => random_int(0, 1),
            ]);

            Image::create([
                'species_id' => Species::inRandomOrder()->first()->id,
                'img_url' => Str::random(10),
            ]);

            Article::create([
                'bird_id' => Species::inRandomOrder()->first()->id,
                'general_info' => Str::random(100),
                'appearance' => Str::random(100),
                'voice_description' => Str::random(100),
                'habitat' => Str::random(100),
                'behavior' => Str::random(100),
                'feeding' => Str::random(100),
                'breeding' => Str::random(100),
            ]);
        }
    }
}
