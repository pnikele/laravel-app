<?php

namespace App\Policies;

use App\Models\Meter_reading;
use App\Models\Reader_installation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;

class Reader_installationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Reader_installation $reader): bool
    {
        $owner = Reader_installation::join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
        ->join('users', 'users.id', '=' , 'addresses.user_id')
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
            ->where('readers.id',$reader->id)
        ->select('users.*')
        ->get();
        //dd($owner->first()->id ==$user->id);
        return $user->id==$owner->first()->id;
    }



}
