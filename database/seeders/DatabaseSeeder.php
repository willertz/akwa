<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(10)->create();
        \App\Models\AObject::factory(10)->create();
        \App\Models\ShopCategory::factory(5)->create();
        \App\Models\Item::factory(20)->create();
        \App\Models\Slider::factory(5)->create();
    }
}
