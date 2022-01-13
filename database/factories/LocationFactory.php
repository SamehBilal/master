<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'               => $this->faker->name(),
            'street'             => Str::random(10),
            'building'           => $this->faker->numerify('####'),
            'floor'              => $this->faker->numerify('###'),
            'apartment'          => $this->faker->numerify('##'),
            'landmarks'          => Str::random(50),
            'country_id'         => $this->faker->randomElement([1,2,3,4,5]),
            'state_id'           => $this->faker->randomElement([1,2,3,4,5]),
            'city_id'            => $this->faker->randomElement([1,2,3,4,5]),
            'business_user_id'   => 2,
        ];
    }
}
