<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'                  => $this->faker->randomElement(['Deliver', 'Exchange', 'Return', 'Cash Collection']),
            'status'                => $this->faker->randomElement(['New','Awaiting your action','On hold','Canceled','Rescheduled','Out for delivery','Completed','Return to origin','Cannot be delivered']),
            'tracking_no'           => $this->faker->numerify('#######'),
            'cash_on_delivery'      => $this->faker->numerify('###'),
            'customer_id'           => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
            'pickup_id'             => $this->faker->randomElement([1,2,3,4,5]),
            'location_id'           => $this->faker->randomElement([1,2,3,4,5]),
            'business_user_id'      => 2,
        ];
    }
}
