<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Reader_installation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelIgnition\Recorders\QueryRecorder\Query;


class AddressesController extends Controller
{
    public function index(){
        $addresses = auth()->user()->accessibleAddresses();

        return view('addresses.index',compact('addresses'));

    }

    public function show(Address $address)
    {
        $this->authorize('update', $address);
        // $response = $this->authorize('update', $address);


        $readers = DB::table('reader_installations')
        ->join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
            ->where('addresses.id',$address->id)
        ->join('users', 'users.id', '=' , 'addresses.user_id')
            ->where('users.id',auth()->user()->id)
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
        ->select('users.name', 'users.surname', 'users.email','readers.identifier', 'readers.manufacturer','readers.manufature_date','reader_installations.installation_date','reader_installations.expiration_date')
        ->get();
        return view('addresses.show',compact('address','readers'));
    }

    public function create(){
        $counties = DB::table('counties')->get();

        return view('addresses.create',compact('counties'));
    }

    public function store(){
        auth()->user()->addresses()->create($this->validateRequest());

        return redirect('/addresses');
    }

    public function edit(Address $address)
    {
        $counties = DB::table('counties')->get();

        $this->authorize('update', $address);

        return view('addresses.edit', compact('address','counties'));
    }

    public function update(Address $address)
    {
        $this->authorize('update', $address);

        $address->update($this->validateRequest());

        return redirect('/addresses');
    }

    

    protected function validateRequest()
    {
        return request()->validate([
            'country' => 'required',
            'county_or_city' => 'required',
            'address' => 'required|max:255'
        ],[
            'country.required' =>'Valsts lauks ir jāaizpilda obligāti.',
            'county_or_city.required' =>'Izvēle obligāta.',
            'address.required' => 'Adreses lauks ir jāaizpilda obligāti.',
            'address.max' =>'Adresei jābūt maksimums 255 simboliem.',
        ]);
    }


}
