<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ShopCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ShopCategory>
 */
class ShopCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
            'depth_level' => 1,
            'parent_id' => 0,
            'priority' => fake()->numberBetween(1, 100),
        ];
    }
}
