<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }
    public function login()
    {
        return view('users.login');
    }
    public function store()
    {
        $data = request()->validate(([
            'name' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('users','email'),'min:3','Regex:/^.+@.+$/i'],
            'password' => ['required','min:6'],
            'role' => 'required'
        ]));
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect('/')->with('success','User created successfully');
    }

    public function authenticate()
    {
        $data = request()->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(auth()->attempt($data)) {
            return redirect('/')->with('success','User logged in successfully');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);

    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('success','User logged out successfully');
    }
}
