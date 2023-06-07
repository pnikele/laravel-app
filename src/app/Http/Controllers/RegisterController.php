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
            'password.required' =>'Paroles lauks ir jāizpilda obligāts.',
            'email.required' =>'E-pasta lauks ir jāizpilda obligāts.',
            'email.email' =>'Jānorāda derīga e-pasta adrese.',
            'name.required' => 'Vārda lauks ir jāizpilda obligāti.',
            'surname.required' => 'Uzvārda lauks ir jāizpilda obligāti.',
            'password.min' =>'Parolei jābūt vismaz 8 simboliem',
            'password_confirmation.required' => 'Paroles atkārtošanas lauks jāizpilda obligāti',
            

        ]);

        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
