<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Meter_reading;
use App\Models\Reader_installation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Address::factory(5)->create();
        // Contact::factory(5)->create();
        Reader_installation::factory(3)
            ->has(Meter_reading::factory()->count(3))
            ->create();
    }
}
