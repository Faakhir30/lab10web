<?php

namespace App\Http\Controllers;

use App\Models\classes;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function class()
    {
        $class = request('class');
        $class = classes::find($class);
        $students = $class->attendance;
        @dd($students);
    }
}
