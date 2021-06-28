<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listIdOrder = Order::pluck('id');
        $listIdProduct = Product::pluck('id');
        
        return [
            'order_id' => $this->faker->randomElement($listIdOrder),
            'product_id' => $this->faker->randomElement($listIdProduct),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
