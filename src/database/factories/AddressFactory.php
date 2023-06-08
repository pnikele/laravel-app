<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $house_number=fake()->optional(0.5,null)->numberBetween(1,1000);

        if($house_number==null)
        {
            $apartment_number=null;
            $house_name = fake()->word();
        }else{
            $apartment_number = fake()->optional(0.5,null)->numberBetween(1,200);
            $house_name =null;
        }

        return [
            'country' => fake()->country(),
            'county' => fake()->word(),
            'parish' => fake()->word(),
            'city' => fake()->city(),
            'street' => fake()->streetName(),
            //'house_number'=>fake()->numberBetween(1,1000),
            //'apartment_number'=>fake()->optional(0.5,null)->numberBetween(1,200),
            //'apartment_number'=>fake()->numberBetween(1,200),
            'house_number'=>$house_number,
            'apartment_number'=> $apartment_number,
            'house_name'=>$house_name,
            'user_id'=>User::factory(),
            
        ];
    }
}
