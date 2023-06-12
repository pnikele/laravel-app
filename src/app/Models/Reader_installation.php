<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader_installation extends Model
{
    use HasFactory;

    public function meterReading()
    {
        return $this->hasMany(Meter_reading::class);
    }

    //     public function readers()
    // {
    //     return $this->belongsTo(Reader::class);
    // }


    

    // public function addresses()
    // {
    //     return $this->hasMany(Address::class);
    // }

    // public function reader(){
    //     return $this->hasOne(Reader::class);
    // }
}
