<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'county_or_city',
        'address',
        'user_id',
    ];
    public function reader_installations()
    {
        return $this->hasMany(Reader_installation::class);
    }

    /**
     * Summary of owner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return "/addresses/{$this->id}";
    }

    public function pathid()
    {
        return "/{$this->id}";
    }


}
