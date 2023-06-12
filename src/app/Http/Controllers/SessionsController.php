<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'password.required' =>'Paroles lauks ir obligāts.',
            'email.required' =>'E-pasta lauks ir obligāts.',
            'email.email' =>'E-pasta laukam ir jābūt derīgai e-pasta adresei.',

        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'password' => 'Nederīga pieslēgšanās, lūdzu, mēģiniet vēlreiz!'
            ]);
        }else{

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
        }
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}

