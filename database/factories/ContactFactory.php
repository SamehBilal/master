<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contact_name'          => $this->faker->name(),
            'contact_job_title'     => $this->faker->name(),
            'contact_email'         => $this->faker->email(),
            'contact_phone'         => $this->faker->numerify('###########'),
            'customer_id'           => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
            'business_user_id'      => 3,
        ];
    }
}
