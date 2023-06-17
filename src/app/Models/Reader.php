<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'identifier',
        'manufacturer',
        'manufature_date',
    ];

    public function reader_installations()
    {
        return $this->hasOne(Reader_installation::class);
    }

    // public function reader_installations()
    // {
    //     return $this->belongsTo(Reader_installation::class);
    // }

    
}
