<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                  => $this->faker->name(),
            'email'                 => $this->faker->unique()->safeEmail(),
            'phone'                 => $this->faker->phoneNumber(),
            'status'                => $this->faker->randomElement(['active','inactive']),
            'user_category_id'      => $this->faker->randomElement([1,2,3,4,5]),
        ];
    }
}
