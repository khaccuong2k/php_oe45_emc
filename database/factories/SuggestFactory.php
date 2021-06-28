<?php

namespace Database\Factories;

use App\Models\Suggest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuggestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suggest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listIdUser = User::pluck('id');
        return [
            'content' => $this->faker->sentence(10, true),
            'user_id' => $this->faker->randomElement($listIdUser),
            'status' => $this->faker->numberBetween(1, 3),
        ];
    }
}
