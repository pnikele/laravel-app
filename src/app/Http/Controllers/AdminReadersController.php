<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminReadersController extends Controller
{
    public function index(){
        $readers = Reader::all();

        return view('admin.readers.index', compact('readers'));
    }

    public function show(Reader $reader)
    {
        return view('admin.readers.show',compact('reader'));
    }

    public function edit(Reader $reader)
    {
        return view('admin.readers.edit', compact('reader'));
    }

    public function update(Reader $reader)
    {

        $attributes = request()->validate([
            'manufacturer' => 'required',
            'manufature_date' => 'required|date_format:"Y-m-d"',
            'identifier' => ['required','min:10',
                Rule::unique('readers')->ignore($reader->id),
        ]
        ],[
            'identifier.required' =>'Identifikatora lauks ir jāaizpilda obligāti.',
            'identifier.unique' =>'Šāds identifikators jau eksistē.',
            'manufacturer.required' =>'Izgatavotāja lauks ir jāaizpilda obligāti.',
            'manufature_date.required' => 'Izgatavošanas datums jānorāda obligāti.',
            'manufature_date.date_format' => 'Izgatavošanas datumam jāatbilst formātam yyyy-mm-dd.',
        ]);

        $reader->update($attributes);

        return redirect('admin/readers');
    }

    public function create(){

        return view('admin.readers.create');
    }

    public function store(){

        $attributes = request()->validate([
            'manufacturer' => 'required',
            'manufature_date' => 'required|date_format:"Y-m-d"',
            'identifier' => 'required|unique:readers,identifier|min:10',
        ],[
            'identifier.required' =>'Identifikatora lauks ir jāaizpilda obligāti.',
            'identifier.unique' =>'Šāds identifikators jau eksistē.',
            'identifier.min' =>'Identifikatora laukam ir jābūt vismaz 10 rakstzīmēm.',
            'manufacturer.required' =>'Izgatavotāja lauks ir jāaizpilda obligāti.',
            'manufature_date.required' => 'Izgatavošanas datums jānorāda obligāti.',
            'manufature_date.date_format' => 'Izgatavošanas datumam jāatbilst formātam yyyy-mm-dd.',
        ]);

        Reader::create($attributes);
        
        return redirect('admin/readers');
    }
}
