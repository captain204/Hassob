<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_number'=>$this->faker->numerify('SN-###########'),
            'description'=>$this->faker->text(),
            'fixed_movable'=>$this->faker->name(),
            'picture_path'=>$this->faker->imageUrl(640, 480, 'animals', true),
            'purchase_date'=>$this->faker->date(),
            'start_use_date'=>$this->faker->date(),
            'purchase_price'=>$this->faker->randomNumber(7,true),
            'warranty_expiry_date'=>$this->faker->date(),
            'degredation_in_years'=>$this->faker->randomDigitNotNull(),
            'current_value'=>$this->faker->randomDigitNotNull(),
            'location'=>$this->faker->countryCode()
        ];
    }
}
