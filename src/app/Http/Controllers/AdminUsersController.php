<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminUsersController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {

        return view('admin.users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => ['email','max:255','required',
                Rule::unique('users')->ignore($user->id),
        ], 'is_admin' => 'required',
        ],[
            'email.email' =>'Jānorāda derīga e-pasta adrese.',
            'name.required' => 'Vārda lauks ir jāaizpilda obligāti.',
            'surname.required' => 'Uzvārda lauks ir jāaizpilda obligāti.',
            'email.unique' => 'Šis e-pasts jau ir aizņemts.'
        ]);

        $user->update($attributes);

        return redirect('/admin/users');
    }

    public function create(){

        return view('admin.users.create');
    }
}
