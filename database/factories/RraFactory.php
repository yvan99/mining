<?php

namespace Database\Factories;

use App\Models\Rra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
class RraFactory extends Factory
{
    protected $model = Rra::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // default password
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'ra_code' => $this->faker->unique()->randomNumber(),
        ];
    }
}
