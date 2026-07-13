<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $faker = fake('ja_JP');

        return [
            //
            "title" => $faker->realText(20),
            "body"  => $faker->realText(120),
            "created_at" => $faker->dateTime("now"),

        ];
    }
}
