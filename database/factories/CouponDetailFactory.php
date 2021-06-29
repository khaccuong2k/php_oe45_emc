<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\CouponDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CouponDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listIdUser = User::pluck('id');
        $listIdCoupon = Coupon::pluck('id');

        return [
            'user_id' => $this->faker->randomElement($listIdUser),
            'coupon_id' => $this->faker->randomElement($listIdCoupon),
        ];
    }
}
