<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Reader;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader_installation>
 */
class Reader_installationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startingDate = fake()->dateTimeThisYear();
        //$endingDate   = strtotime('+2 years', $startingDate->getTimestamp());
        //$endingDate = fake()->date($startingDate,'+2 years');
        $endingDate = fake()->dateTimeBetween($startingDate->format('Y-m-d H:i:s').' +2 years', $startingDate->format('Y-m-d H:i:s').' +2 years');
        $user =  DB::table('users')->where('id', '=', 1)->get()->first();
        
        return [
            'reader_id'=>Reader::factory(),
            // 'address_id'=>Address::factory(['user_id' => $user->id]),
            'installation_date'=>$startingDate,
            'expiration_date'=>$endingDate,
        ];
    }
}
