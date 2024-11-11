<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
final class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['draft', 'reviewing', 'published', 'rejected', 'scheduled']);

        return [
            'user_id' => User::inRandomOrder()->first(),
            'category_id' => Category::inRandomOrder()->first(),
            'title' => fake()->sentence,
            'slug' => fake()->unique()->slug,
            'excerpt' => fake()->sentence,
            'content' => fake()->text,
            'status' => $status,
            'publish_on' => 'scheduled' === $status ? fake()->dateTimeBetween('now', '+3 months') : null,
            'published_at' => 'published' === $status ? fake()->dateTimeBetween('-1 year', 'now') : null,
        ];
    }
}
