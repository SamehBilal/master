<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'            => $this->faker->name(),
            'last_name'             => $this->faker->name(),
            'full_name'             => $this->faker->name(),
            'phone'                 => $this->faker->numerify('###########'),
            'other_phone'           => $this->faker->numerify('###########'),
            'email'                 => $this->faker->unique()->safeEmail(),
            'other_email'           => $this->faker->unique()->safeEmail(),
            'status'                => $this->faker->randomElement(['active','inactive']),
            'user_category_id'      => $this->faker->randomElement([1,2,3,4,5]),
            'customer_id'           => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
            'business_user_id'      => 3,
        ];
    }
}
