<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\DB;

class AdminAddressesController extends Controller
{
    public function index(){
        $addresses = Address::all();
        return view('admin.addresses.index', compact('addresses'));
    }

    public function show(Address $address)
    {
        $this->authorize('update', $address);
        // $response = $this->authorize('update', $address);


        $readers = DB::table('reader_installations')
        ->join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
            ->where('addresses.id',$address->id)
        ->join('users', 'users.id', '=' , 'addresses.user_id')
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
        ->select('users.name', 'users.surname', 'users.email','readers.identifier', 'readers.manufacturer','readers.manufature_date','reader_installations.installation_date','reader_installations.expiration_date')
        ->get();

        
        return view('admin.addresses.show',compact('address','readers'));
    }


    public function edit(Address $address)
    {
        $counties = DB::table('counties')->get();

        $users = DB::table('users')->where('is_admin',0)->get();
        //dd($users);

        $this->authorize('update', $address);

        return view('admin.addresses.edit', compact('address','counties','users'));
    }

    public function update(Address $address)
    {
        $this->authorize('update', $address);

        $address->update($this->validateRequest());
        // dd($address);

        return redirect('admin/addresses');
    }

    public function create(){
        $counties = DB::table('counties')->get();
        $users = DB::table('users')->where('is_admin',0)->get();

        return view('admin.addresses.create',compact('counties','users'));
    }


    public function store(){
        // dd($this);
        Address::create($this->validateRequest());
        

        return redirect('admin/addresses');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'country' => 'required',
            'county_or_city' => 'required',
            'address' => 'required|max:255',
            'user_id' => 'required',
        ],[
            'country.required' =>'Valsts lauks ir jāaizpilda obligāti.',
            'county_or_city.required' =>'Izvēle obligāta.',
            'address.required' => 'Adreses lauks ir jāaizpilda obligāti.',
            'address.max' =>'Adresei jābūt maksimums 255 simboliem.',
        ]);
    }
}
