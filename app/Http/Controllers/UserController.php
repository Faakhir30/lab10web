<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\classes;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    // Retrieve user by email
    $user = User::where('email', $data['email'])->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Compare passwords without hashing
    if ($data['password'] === $user->password) {
        // Password matches, log in the user
        auth()->login($user);

        if ($user->role == 'teacher') {
            return redirect('/sessions')->with('success', 'User logged in successfully');
        }

        return redirect('/classes')->with('success', 'User logged in successfully');
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

    public function classes()
    {
        $averageAttendances = attendance::where('student_id',auth()->id())->join('classes','classes.id','=','attendances.class_id')->select('classes.name','classes.id',DB::raw('avg(attendances.is_present)*100 as average'))->groupBy('classes.name','classes.id')->get();
        return view('users.classes',compact('averageAttendances'));
    }
    
    public function class()
    {
        $classAttendance = attendance::where('student_id',auth()->id())->where('class_id',request('class'))->join('classes','classes.id','=','attendances.class_id')->orderBy('attendances.created_at','asc')->get();
        // add fields such as total_conducted and totaal attended and average attendance
        $classAttendance->total_conducted = $classAttendance->count();
        $classAttendance->total_attended = $classAttendance->sum('is_present');
        $classAttendance->average = $classAttendance->total_attended/$classAttendance->total_conducted*100;
        return view('users.class',compact('classAttendance'));
    }
}
