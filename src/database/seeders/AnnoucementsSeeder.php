<?php

namespace Database\Seeders;

use App\Models\Announcements;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnoucementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcements::factory(1)->create();
    }
}
