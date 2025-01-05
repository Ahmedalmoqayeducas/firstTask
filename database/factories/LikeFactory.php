<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id'=>fake()->numberBetween(1,User::count()),
            'post_id'=>fake()->numberBetween(1,Posts::count()),
            'comment_id'=>fake()->numberBetween(1,Comment::count()),

        ];
    }
}
