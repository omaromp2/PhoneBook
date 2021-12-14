<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Faker for dummy data
            'name' => $this->faker->name(),
            'lastname' => $this->faker->name(),
            'phone' => $this->faker->numerify('###-###-####')
        ];
    }
}
