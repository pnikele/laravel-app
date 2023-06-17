<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Reader;
use App\Models\Reader_installation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminReaders_installationsController extends Controller
{
    public function index(){
        $readers_installations = Reader_installation::join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
        ->join('users', 'users.id', '=' , 'addresses.user_id')
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
        ->select('addresses.*','users.*', 'readers.*', 'reader_installations.*')
        ->get();
        return view('admin.readers_installations.index',compact('readers_installations'));
    }

    public function show(Reader_installation $readers_installation)
    {
        $readers_installation_data = Reader_installation::join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
        ->join('users', 'users.id', '=' , 'addresses.user_id')
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
            ->where('reader_installations.id',$readers_installation->id)
        ->select('addresses.*','users.*', 'readers.*', 'reader_installations.*')
        ->get()->first();

        $readings = Reader_installation::query()
            ->join('meter_readings', 'meter_readings.reader_installation_id', '=' , 'reader_installations.id')
            ->where('reader_installations.id',$readers_installation->id)
            ->select('meter_readings.*')
            ->orderBy('reading_datetime', 'DESC')
            ->get();

        return view('admin.readers_installations.show',compact('readers_installation_data','readers_installation','readings'));
    }

    public function edit(Reader_installation $readers_installation)
    {
        $readers_installation_data = Reader_installation::join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
        ->join('users', 'users.id', '=' , 'addresses.user_id')
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
            ->where('reader_installations.id',$readers_installation->id)
        ->select('addresses.*','users.*', 'readers.*', 'reader_installations.*')
        ->get()->first();

        $readers = Reader::all()->except($readers_installation->reader_id);
        $addresses = Address::all()->except($readers_installation->address_id);
        return view('admin.readers_installations.edit', compact('readers_installation','readers','readers_installation_data','addresses'));
    }

    public function update(Reader_installation $readers_installation)
    {

        $attributes = request()->validate([
            'address_id' => 'required',
            'installation_date' =>'required|date_format:"Y-m-d"',
            'expiration_date' =>'required|date_format:"Y-m-d"',
            'reader_id' => [Rule::unique('reader_installations')->ignore($readers_installation->id),
        ],
        ],[
            'reader_id.unique' =>'Šāds skaitītājs jau ir uzstādīts.',
            'address_id.required' =>'Adrese jānorāda obligāti.',
            'installation_date.required' => 'Instalācijas datums jānorāda obligāti.',
            'installation_date.date_format' => 'Datumam jāatbilst formātam yyyy-mm-dd.',
            'expiration_date.required' => 'Apkopes datums jānorāda obligāti.',
            'expiration_date.date_format' => 'Datumam jāatbilst formātam yyyy-mm-dd.',
        ]);
        dd($attributes);
        $readers_installation->update($attributes);

        return redirect('admin/reader_installations');
    }

    public function create(){
        $readers = Reader::all();
        $addresses = Address::all();

        return view('admin.readers_installations.create',compact('readers','addresses'));
    }

    public function store(){
        $attributes = request()->validate([
            'address_id' => 'required',
            'installation_date' =>'required|date_format:"Y-m-d"',
            'expiration_date' =>'required|date_format:"Y-m-d"',
            'reader_id' => [Rule::unique('reader_installations'),'required'
        ],
        ],[
            'reader_id.unique' =>'Šāds skaitītājs jau ir uzstādīts.',
            'reader_id.required' =>'Skaitītājs jānorāda obligāti.',
            'address_id.required' =>'Adrese jānorāda obligāti.',
            'installation_date.required' => 'Instalācijas datums jānorāda obligāti.',
            'installation_date.date_format' => 'Datumam jāatbilst formātam yyyy-mm-dd.',
            'expiration_date.required' => 'Apkopes datums jānorāda obligāti.',
            'expiration_date.date_format' => 'Datumam jāatbilst formātam yyyy-mm-dd.',
        ]);


        Reader_installation::create($attributes);
        
        return redirect('admin/reader_installations');
    }

}
