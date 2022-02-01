<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asset;
use App\Models\User;

class AssetAssighmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asset_id'=>Asset::all()->random(),
            'assighment_date'=>$this->faker->date(),
            'status'=>$this->faker->name(),
            'is_due'=>$this->faker->date(),
            'due_date'=>$this->faker->date(),
            'user_id'=>User::all()->random(),
            'assigned_by'=>$this->faker->name()
        ];
    }
}
