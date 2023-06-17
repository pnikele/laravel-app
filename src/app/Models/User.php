<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // password hashing

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function accessibleAddresses()
	{
	    return Address::where('user_id', $this->id)
            ->get();
	}

    public function accessibleReader_installations()
	{
	    return Reader_installation::join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
        ->join('users', 'users.id', '=' , 'addresses.user_id')
            ->where('users.id',$this->id)
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
        ->select('addresses.country', 'addresses.county_or_city','addresses.address','users.name', 'users.surname', 'users.email','readers.identifier', 'readers.manufacturer','readers.manufature_date','reader_installations.installation_date','reader_installations.expiration_date','reader_installations.id as readerinst_id')
        ->get();
	}

    public function isAdministrator()
	{
	    return User::where('is_admin', 1)
            ->get();
	}
}
