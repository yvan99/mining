<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DeliveryFactory extends Factory
{

    protected $model = Delivery::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // default password
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
