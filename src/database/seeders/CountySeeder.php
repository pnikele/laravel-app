<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $data =[
            ['county_or_city' => 'Jelgava',],
            ['county_or_city' => 'Jūrmala',],
            ['county_or_city' => 'Liepāja',],
            ['county_or_city' => 'Ogre',],
            ['county_or_city' => 'Rēzekne',],
            ['county_or_city' => 'Rīga',],
            ['county_or_city' => 'Valmiera',],
            ['county_or_city' => 'Ventspils',],
            ['county_or_city' => 'Daugavpils',],
            ['county_or_city' => 'Jēkabpils',],
            ['county_or_city' => 'Ādažu novads',],
            ['county_or_city' => 'Aizkraukles novads',],
            ['county_or_city' => 'Alūksnes novads',],
            ['county_or_city' => 'Augšdaugavas novads',],
            ['county_or_city' => 'Balvu novads',],
            ['county_or_city' => 'Bauskas novads',],
            ['county_or_city' => 'Cēsu novads',],
            ['county_or_city' => 'Dienvidkurzemes novads',],
            ['county_or_city' => 'Dobeles novads',],
            ['county_or_city' => 'Gulbenes novads',],
            ['county_or_city' => 'Jēkabpils novads',],
            ['county_or_city' => 'Jelgavas novads',],
            ['county_or_city' => 'Krāslavas novads',],
            ['county_or_city' => 'Kuldīgas novads',],
            ['county_or_city' => 'Ķekavas novads',],
            ['county_or_city' => 'Limbažu novads',],
            ['county_or_city' => 'Līvānu novads',],
            ['county_or_city' => 'Ludzas novads',],
            ['county_or_city' => 'Madonas novads',],
            ['county_or_city' => 'Mārupes novads',],
            ['county_or_city' => 'Ogres novads',],
            ['county_or_city' => 'Olaines novads',],
            ['county_or_city' => 'Preiļu novads',],
            ['county_or_city' => 'Rēzeknes novads',],
            ['county_or_city' => 'Ropažu novads',],
            ['county_or_city' => 'Salaspils novads',],
            ['county_or_city' => 'Saldus novads',],
            ['county_or_city' => 'Saulkrastu novads',],
            ['county_or_city' => 'Siguldas novads',],
            ['county_or_city' => 'Smiltenes novads',],
            ['county_or_city' => 'Talsu novads',],
            ['county_or_city' => 'Tukuma novads',],
            ['county_or_city' => 'Valkas novads',],
            ['county_or_city' => 'Valmieras novads',],
            ['county_or_city' => 'Varakļānu novads',],
            ['county_or_city' => 'Ventspils novads',],
        ];
        County::insert($data);
    }
}
