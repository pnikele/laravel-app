<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Meter_reading;
use App\Models\Reader_installation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWithReadingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user =  DB::table('users')->where('id', '=', 3)->get()->first();

        // $user= User::factory()->create([
        //     'name' => "Paula",
        //     'surname' => "Niķele",
        //     'email' => "paula.nikele@gmail.com",
        //     'password' => "12345678",

        // ]);

        $user= User::factory()->create([
            'name' => "Anna",
            'surname' => "Liepiņa",
            'email' => "anna.liepina@gmail.com",
            'password' => "12345678",

        ]);

        // Address::factory(5)->create([
        //     'user_id' => $user->id
        // ]);

        // Reader_installation::factory()
        //     ->has(Meter_reading::factory()->count(10))
        //     ->create([
        //         'address_id'=>Address::factory(['user_id' => $user->id])
        //     ]);

        Reader_installation::factory()
        ->has(Meter_reading::factory([
            'reading' => "204.100",
            'reading_datetime' => "2021-01-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "230.543",
            'reading_datetime' => "2021-02-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "273.244",
            'reading_datetime' => "2021-03-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "315.143",
            'reading_datetime' => "2021-04-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "356.143",
            'reading_datetime' => "2021-05-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "388.143",
            'reading_datetime' => "2021-06-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "426.183",
            'reading_datetime' => "2021-07-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "466.583",
            'reading_datetime' => "2021-08-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "496.183",
            'reading_datetime' => "2021-09-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "524.132",
            'reading_datetime' => "2021-10-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "514.532",
            'reading_datetime' => "2021-11-1 01:00:00",
        ]))
        ->has(Meter_reading::factory([
            'reading' => "515.165",
            'reading_datetime' => "2021-12-1 01:00:00",
        ]))
        ->create([
            'address_id'=>Address::factory(['user_id' => $user->id])
        ]);

        //Address::factory(5)->create();
        // Contact::factory(5)->create();
        
        // Reader_installation::factory(3)
        //     ->has(Meter_reading::factory()->count(3))
        //     ->create();
        
    }
}
