<?php

namespace Database\Factories;

use App\Models\Pickup;
use Illuminate\Database\Eloquent\Factories\Factory;

class PickupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pickup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pickup_id'             => $this->faker->numerify('######'),
            'scheduled_date'        => now(),
            'contact_id'            => $this->faker->randomElement([1,2,3,4,5]),
            'location_id'           => $this->faker->randomElement([1,2,3,4,5]),
            'business_user_id'      => 3,
        ];
    }
}
