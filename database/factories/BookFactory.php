<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booktitle' =>$this->faker->word(),
            'bookauthor' => $this->faker->word(),
            'description' => $this->faker->word(),
            "booktype"=> $this->faker->randomElement(['Art/Architecture','Novel','Historical Fictions','Horror','Crime', 'Classic', 'Science', 'Plays', 'Mystery']),
            "user_id"=> $this->faker->numberBetween(1,10)
        ];
    }
}
