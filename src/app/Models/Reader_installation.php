<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader_installation extends Model
{
    use HasFactory;

    public function meter_readings()
    {
        return $this->hasMany(Meter_reading::class);
    }


}
