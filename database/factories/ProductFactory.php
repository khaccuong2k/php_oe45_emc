<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listCategoryId = Category::pluck('id');

        return [
            'name' => $this->faker->name(),
            'thumbnail' => $this->faker->imageUrl(640, 480),
            'content' => $this->faker->sentence(10, true),
            'short_description' => $this->faker->sentence(10, true),
            'quantity' => $this->faker->numberBetween(1, 100),
            'views' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(100000, 999999),
            'number_of_vote_submissions' => $this->faker->numberBetween(1, 30),
            'total_vote' => $this->faker->numberBetween(1, 50),
            'sold' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->randomElement($listCategoryId),
        ];
    }
}
