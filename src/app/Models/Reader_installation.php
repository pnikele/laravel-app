<?php

namespace App\Models;

use App\Models\Reader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader_installation extends Model
{
    use HasFactory;
    protected $fillable = [
        'reader_id',
        'address_id',
        'installation_date',
        'expiration_date'
    ];
    public function meterReading()
    {
        return $this->hasMany(Meter_reading::class);
    }

    public function path()
    {
        return "/readers/{$this->id}";
    }



    

    // public function addresses()
    // {
    //     return $this->hasMany(Address::class);
    // }

    // public function reader(){
    //     return $this->hasOne(Reader::class);
    // }
}
