<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listCa = Category::pluck('id');
        $listPo = Product::pluck('id');

        return [
            'category_id' => $this->faker->randomElement($listCa),
            'product_id' => $this->faker->randomElement($listPo),
        ];
    }
}
