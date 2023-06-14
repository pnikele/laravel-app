<?php

namespace App\Http\Controllers;

use App\Models\Meter_reading;
use Illuminate\Http\Request;
use App\Models\Reader;
use App\Models\Reader_installation;
use Illuminate\Support\Facades\DB;

class Reader_installationsController extends Controller
{
    public function index(){
        $readers = auth()->user()->accessibleReader_installations();

        return view('readers.index',compact('readers'));
    }

    public function show(Reader_installation $reader)
    {
        $this->authorize('view', $reader);

        // Reader_installation::join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
        // ->join('users', 'users.id', '=' , 'addresses.user_id')
        //     ->where('users.id',$reader->id)
        // ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
        // ->select('addresses.country', 'addresses.county_or_city','addresses.address','users.name', 'users.surname', 'users.email','readers.identifier', 'readers.manufacturer','readers.manufature_date','reader_installations.installation_date','reader_installations.expiration_date')
        // ->get();
            $readers = Reader_installation::join('addresses', 'reader_installations.address_id', '=' , 'addresses.id')
        ->join('users', 'users.id', '=' , 'addresses.user_id')
            ->where('users.id',auth()->user()->id)
        ->join('readers', 'reader_installations.reader_id', '=', 'readers.id')
            ->where('readers.id',$reader->reader_id)
        ->select('reader_installations.id','addresses.country', 'addresses.county_or_city','addresses.address','users.name', 'users.surname', 'users.email','readers.identifier', 'readers.manufacturer','readers.manufature_date','reader_installations.installation_date','reader_installations.expiration_date')
        ->get();


        // dd($readers);


        $thisyearorders = Reader_installation::query()
            ->join('meter_readings', 'meter_readings.reader_installation_id', '=' , 'reader_installations.id')
            ->whereYear('meter_readings.reading_datetime','2021')
            ->selectRaw('month(meter_readings.reading_datetime) as month')
            ->selectRaw('meter_readings.reading as reading')
            // ->selectRaw('meter_readings.reader_installation_id')
            ->where('reader_installations.id',$reader->id)
            ->orderBY('month') 
            ->pluck('meter_readings.reading','month')
            ->values() //to get the month as number value not a month
            ->toArray(); //collection transform to array

            // dd($thisyearorders);
        return view('readers.show',compact('reader','readers','thisyearorders'));
    }
}
