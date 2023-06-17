<?php

namespace Database\Factories;

use App\Models\Meter_reading;
use App\Models\Reader_installation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meter_reading>
 */
class Meter_readingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reader_installation_id'=>fake()->numberBetween(100,10000000),
            'reading'=>fake()->numberBetween(100,10000000),
            'reading_datetime'=>fake()->dateTimeBetween('-2 years','now')

        ];
    }
}
