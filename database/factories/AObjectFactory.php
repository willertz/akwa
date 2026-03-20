<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AObject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<AObject>
 */
class AObjectFactory extends Factory
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
            'name' => fake()->sentence(),
            'title' => fake()->sentence(),
            'preview_pict' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
            'slider_hash' => Str::random(10),
            'content' => fake()->paragraphs(3, true),
        ];
    }
}
