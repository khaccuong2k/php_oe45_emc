<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listIdRole = Role::pluck('id');

        return [
            'username' => $this->faker->domainName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make(111111),
            'fullname' => $this->faker->name(),
            'avatar' => $this->faker->imageUrl(640, 480),
            'address' => $this->faker->streetAddress(),
            'phone' => $this->faker->phoneNumber(),
            'role_id' => $this->faker->randomElement($listIdRole),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(
            function (array $attributes) {
                return [
                'email_verified_at' => null,
                ];
            }
        );
    }
}
