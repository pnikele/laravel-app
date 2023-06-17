<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
            'password_confirmation' => 'required|same:password',
        ],[
            'password.required' =>'Paroles lauks ir jāaizpilda obligāti.',
            'email.required' =>'E-pasta lauks ir jāaizpilda obligāti.',
            'email.email' =>'Jānorāda derīga e-pasta adrese.',
            'name.required' => 'Vārda lauks ir jāaizpilda obligāti.',
            'surname.required' => 'Uzvārda lauks ir jāaizpilda obligāti.',
            'password.min' =>'Parolei jābūt vismaz 8 simboliem',
            'password_confirmation.required' => 'Paroles atkārtošanas lauks jāaizpilda obligāti',
            'email.unique' => 'Šis e-pasts jau ir aizņemts.'
    
        ]);

        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
