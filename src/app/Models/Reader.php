<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    public function reader_installations()
    {
        return $this->hasOne(Reader_installation::class);
    }
}
