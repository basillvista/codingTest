<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'user_id'=>rand(1, 30),
        ];
    }

    protected $model = Customer::class;

}
