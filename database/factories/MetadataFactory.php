<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Metadata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Metadata>
 */
final class MetadataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Metadata::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'metadatable_type' => fake()->word,
            'metadatable_id' => fake()->randomNumber(),
            'keywords' => fake()->optional()->word,
            'description' => fake()->optional()->text,
        ];
    }
}
