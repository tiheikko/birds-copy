<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Faker\Factory as Faker;

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
        Order::factory()->count(30)->create();
        Family::factory()->count(30)->create();
        Genus::factory()->count(30)->create();
        Species::factory()->count(30)->create();
        Image::factory()->count(30)->create();
        Article::factory()->count(30)->create();
    }
}
