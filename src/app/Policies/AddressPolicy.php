<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AddressPolicy
{
    use HandlesAuthorization;


    /**
     * Determine if the user may update the project.
     *
     * @param  User    $user
     * @param  Address $address
     * @return bool
     */
    public function update(User $user, Address $address)
    {
        return $user->is($address->user);

    }

    
}
