<?php

namespace Database\Factories\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'names' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // default password
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'cli-code' => $this->faker->unique()->randomNumber(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
