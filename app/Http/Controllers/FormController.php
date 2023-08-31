<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FormController extends Controller 
{
    public function create() {
        return view('createUser');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name fieldis required.',
            'password.required' => 'Password field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Email field must be email add'
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);
        $user = User::create($validateData);

        return back()->with('success', 'User created successfully');
    }
}