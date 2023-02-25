<?php

namespace Database\Factories\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'names' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // default password
        ];
    }
}
